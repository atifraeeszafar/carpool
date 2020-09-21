<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Requests\Master\AddCarRequest;
use App\Http\Requests\Master\UpdateCarRequest;
use App\Http\Controllers\Api\V1\BaseController;
use Illuminate\Http\Request;
use App\Models\Common\RideModel;
use Ramsey\Uuid\Uuid;
use Polyline;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use App\Models\Master\RideJunctionModel;
use Illuminate\Support\Facades\DB;
use App\Transformers\Ride\RideTransformer;

class RideController extends BaseController
{
    public function __construct()
    {
    }

    /**
    * Create Ride
    *
    */
    public function createRide(Request $request)
    {
        $junctions = \json_decode($request->junction);

        $result = array();

        $points = [];


        foreach ($junctions as $key => $junction) {
            $pickup_lat = $junction->lat;
            $pickup_lng = $junction->lng;

            if (array_key_exists(($key+1), $junctions)) {
                $drop_lat   = $junctions[$key+1]->lat;
                $drop_lng   = $junctions[$key+1]->lng;
            }


            if ($drop_lat != null && $drop_lng != null) {
                $newPoints = $this->coordinates($pickup_lat, $pickup_lng, $drop_lat, $drop_lng);

                $points = array_merge($points, $newPoints);

                $poly_points = Polyline::pair($newPoints);

                $points_array = [];

                foreach ($poly_points as $point) {
                    $points_array[] = new Point($point[0], $point[1]);
                }

                $poly_line_string = new LineString($points_array);

                $junctions[$key+1]->coordinates = $poly_line_string;
            }

            $drop_lat   = null;
            $drop_lng   = null;
        }

        $poly_points = Polyline::pair($points);

        $points_overall_array = [];

        foreach ($poly_points as $point) {
            $points_overall_array[] = new Point($point[0], $point[1]);
        }

        $poly_line_string = new LineString($points_overall_array);

        $id = Uuid::uuid4()->toString();

        $ride = RideModel::create([
            'id' => $id,
            'ride_id_string' => strtoupper(uniqid()),
            'rider_id' => 1,
            'ride_date_time' => $request->ride_date_time,
            'no_of_passengers_left' => $request->no_of_passengers_left,
            'trip_status' => 1,
            'coordinates' => $poly_line_string,

        ]);



        foreach ($junctions as $key => $junction) {
            if (array_key_exists(($key+1), $junctions)) {
                RideJunctionModel::create([
                    'ride_id' => $id,//strtoupper(uniqid()),
                    'pick_up_location' => $junction->location,
                    'pick_up_lat' => (string)$junction->lat,
                    'pick_up_lng' => (string)$junction->lng,

                    'drop_location' => $junctions[$key+1]->location,
                    'drop_location_lat' => (string)$junctions[$key+1]->lat,
                    'drop_location_lng' => (string)$junctions[$key+1]->lng,
                    'price' => $junctions[$key+1]->price,
                    'coordinates' => $junctions[$key+1]->coordinates,
                    'status' => '1',
                    'order' => ($key+1),
                ]);
            }
        }

        $result = RideModel::where('id', $id)->first();

        $result = fractal($result, new RideTransformer)->parseIncludes('junction');

        //

        return $this->respondSuccess($result);
    }

    /**
    * List Rides
    */
    public function history(Request $request)
    {
        $result = RideModel::where('rider_id', '1')->get();

        $result = fractal($result, new RideTransformer)->parseIncludes('junction');

        return $this->respondSuccess($result);
    }

    /**
    * Search Ride
    *
    */
    public function search(Request $request)
    {
        $pickup_lat = $request->pick_lat;
        $pickup_lng = $request->pick_lng;

        $drop_lat   = $request->drop_lat;
        $drop_lng   = $request->drop_lng;

        $rideJunctionPickUP = RideJunctionModel::
        select('id', 'ride_id', 'pick_up_location', 'drop_location')
        ->whereRaw("ROUND(1 * 3956 * acos( cos( radians('" . $pickup_lat . "') ) * cos( radians(" . env('DB_PREFIX') . "pick_up_lat) ) * cos( radians(" . env('DB_PREFIX') . "pick_up_lng) - radians('" . $pickup_lng . "') ) + sin( radians('" . $pickup_lat . "') ) * sin( radians(" . env('DB_PREFIX') . "pick_up_lat) ) ) ,8) <= 10")
        ->get()->groupBy('ride_id');

        $rideJunctionDrop = RideJunctionModel::
        select('id', 'ride_id', 'pick_up_location', 'drop_location')
        ->WhereRaw("ROUND(1 * 3956 * acos( cos( radians('" . $drop_lat . "') ) * cos( radians(" . env('DB_PREFIX') . "drop_location_lat) ) * cos( radians(" . env('DB_PREFIX') . "drop_location_lng) - radians('" . $drop_lng . "') ) + sin( radians('" . $drop_lat . "') ) * sin( radians(" . env('DB_PREFIX') . "drop_location_lat) ) ) ,8) <= 10")
        ->get()->groupBy('ride_id');

        $rideJunctionPickUPArray = array();
        $rideJunctionDropArray = array();

        foreach ($rideJunctionPickUP as $key=>$ride) {
            $rideJunctionPickUPArray[$key] = $ride;
        }

        foreach ($rideJunctionDrop as $key=>$ride) {
            $rideJunctionDropArray[$key] = $ride;
        }

        $rideToReterive = array_intersect_key($rideJunctionPickUPArray, $rideJunctionDropArray);


        echo "<pre>";
        print_r($rideToReterive);

        die();

        $newPoints = $this->coordinates($pickup_lat, $pickup_lng, $drop_lat, $drop_lng);

        $poly_points = Polyline::pair($newPoints);

        $points_array = [];

        foreach ($poly_points as $point) {
            $points_array[] = new Point($point[0], $point[1]);
        }

        $poly_line_string = new LineString($points_array);







        $point = new Point($request->pick_lng, $request->pick_lat);

        $haversine = "(6371 * acos(cos(radians($request->pick_lat)) * cos(radians(pick_up_lat)) * cos(radians(pick_up_lng) - radians($request->pick_lng)) + sin(radians($request->pick_lat)) * sin(radians(pick_up_lat))))";

        $drop_haversine = "(6371 * acos(cos(radians($request->drop_lat)) * cos(radians(drop_location_lat)) * cos(radians(pick_up_lng) - radians($request->drop_lng)) + sin(radians($request->drop_lat)) * sin(radians(drop_location_lat))))";

        $drop_radius = 10;

        $ride = RideModel::intersects('coordinates', $poly_line_string)
        ->select('id')
        ->get();
    }

    public function coordinates($pickup_lat, $pickup_lng, $drop_lat, $drop_lng)
    {


        // $api_key = ConfigSettings::get('google_browser_key');

        $api_key = 'AIzaSyBWtJbuXlAX4gJSJVdQL56Z3GZJd8F2U6I';

        $url = 'https://maps.googleapis.com/maps/api/directions/json?&origin='.$pickup_lat.','.$pickup_lng.'&destination='.$drop_lat.','.$drop_lng.'&sensor=false&key='.$api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        $encoded_result = json_decode($result);

        $points = [];

        $poly_line = Polyline::decode($encoded_result->routes[0]->overview_polyline->points);

        return $poly_line;

        echo "<pre>";
        print_r($poly_line);

        die();

        $poly_points = Polyline::pair($poly_line);


        foreach ($poly_points as $key => $point) {
            $points[] = new Point($point[0], $point[1]);
        }


        // $poly_line_string = new LineString($points);



        return $poly_points;


        // $poly_line_string = new LineString($points);

        // DB::connection()->enableQueryLog();

        $radius = GetConfigs::getConfigs('driver_search_radius')?:10;
    }
}
