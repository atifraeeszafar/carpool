<?php

namespace App\Transformers\User;

use Carbon\Carbon;
use App\Models\Admin\Zone;
use App\Models\Admin\Driver;
use App\Models\Admin\ZoneType;
use App\Transformers\Transformer;
use App\Models\Master\DistanceMatrix;
use Illuminate\Support\Facades\Redis;
use App\Base\Constants\Masters\EtaConstants;
use App\Base\Constants\Masters\zoneRideType;
use App\Transformers\Access\RoleTransformer;

class EtaTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ZoneType $zone_type)
    {
        $pick_lat = request()->pick_lat;
        $pick_lng = request()->pick_lng;
        $drop_lat = request()->drop_lat;
        $drop_lng = request()->drop_lng;

        $distance_matrix = get_distance_matrix(request()->pick_lat, request()->pick_lng, request()->drop_lat, request()->drop_lng, true);

        $response =  [
            'zone_type_id' => $zone_type->type_id,
            'name' => $zone_type->vehicleType->name,

        ];

        if ($distance_matrix && $distance_matrix->status == 'OK') {
            $distance = get_distance_text_from_distance_matrix($distance_matrix);

            $duration = get_duration_text_from_distance_matrix($distance_matrix);

            $distance_in_meters = get_distance_value_from_distance_matrix($distance_matrix);

            $distance_in_unit = $distance_in_meters / 1000;

            if ($zone_type->unit==0) {
                $distance_in_unit = kilometer_to_miles($distance_in_unit);
            }

            $duration_in_seconds = get_duration_value_from_distance_matrix($distance_matrix);

            /**
             * get prices from zone type
             */
            if (request()->ride_type==zoneRideType::RIDENOW) {
                $ride_type = zoneRideType::RIDENOW;
            } else {
                $ride_type = zoneRideType::RIDELATER;
            }
            $type_prices = $zone_type->zoneTypePrice()->where('price_type', $ride_type)->first();

            // get previous place json or store current one
            $previous_pickup_dropoff = $this->db_query_previous_pickup_dropoff($pick_lat, $pick_lng, $drop_lat, $drop_lng);

            // $driver_dm = \GuzzleHttp\json_decode($previous_driver->json_result);
            $place_details = json_decode($previous_pickup_dropoff->json_result);

            $nearest_driver = $this->findNearestDriver($pick_lat, $pick_lng, request()->vehicle_type);

            $near_driver_status = 0; //its means there is no driver available
            $driver_lat = $pick_lat;
            $driver_lng = $pick_lng;
            if ($nearest_driver->driverDetail) {
                $driver_lat = $nearest_driver->driverDetail->latitude;
                $driver_lng = $nearest_driver->driverDetail->longitude;
                $near_driver_status = 1;
            }
            $driver_to_pickup = $this->db_query_previous_pickup_dropoff($driver_lat, $driver_lng, $pick_lat, $pick_lng);

            $driver_to_pickup_response = json_decode($driver_to_pickup->json_result);
            $unit_in_words = EtaConstants::ENGLISH_UNITS[$zone_type->zone->unit];
            $translated_unit_in_words = $unit_in_words;
            $ride = $this->calculateRideFares($driver_to_pickup_response, $place_details, $zone_type, $type_prices);

            if ($near_driver_status != 0) {
                if ($ride->pickup_duration != 0) {
                    $driver_arival_estimation = "{$ride->pickup_duration} min";
                } else {
                    $driver_arival_estimation = "1 min";
                }
            } else {
                $driver_arival_estimation = "NA";
            }

            $response['distance'] = $ride->distance;
            $response['time'] = $ride->duration;
            $response['base_distance'] = $ride->base_distance;
            $response['base_price'] = $ride->base_price;
            $response['price_per_distance'] = $ride->price_per_distance;
            $response['price_per_time'] = $ride->price_per_time;
            $response['distance_price'] = $ride->distance_price;
            $response['time_price'] = $ride->time_price;
            $response['ride_fare'] = $ride->subtotal_price;
            $response['tax_amount'] = $ride->tax_amount;
            $response['tax'] = $ride->tax_percent;
            $response['total'] = $ride->total_price;
            $response['approximate_value'] = 1;
            $response['min_amount'] = $ride->total_price;
            $response['max_amount'] = ($ride->total_price * 1.05);
            $response['currency'] = $zone_type->currency_symbol;
            $response['type_name'] = $zone_type->vehicleType->name;
            $response['unit'] = $zone_type->unit;
            $response['unit_in_words_without_lang'] = $unit_in_words;
            $response['unit_in_words'] = $translated_unit_in_words;
            $response['driver_arival_estimation'] = $driver_arival_estimation;
            // dd($ride);

            // dd($previous_pickup_dropoff);
        }


        return $response;
    }

    private function calculateRideFares($driver_to_pickup_response, $place_details, $zone_type, $type_prices)
    {
        $dropoff_distance_in_meters = get_distance_value_from_distance_matrix($place_details);

        if ($dropoff_distance_in_meters) {
            $distance_in_unit = $dropoff_distance_in_meters / 1000;

            if ($zone_type->zone->unit==0) {
                $distance_in_unit = kilometer_to_miles($distance_in_unit);
            }

            $dropoff_time_in_seconds = get_duration_value_from_distance_matrix($place_details);

            $pickup_time_in_seconds = get_duration_value_from_distance_matrix($driver_to_pickup_response);
            $wait_time_in_seconds = 180; // can be change
            /**
            * @TODO surge price calculations
            */
            // $check_if_peak_time = $this->checkIfPeakTime($zone_type, request()->ride_type);
            $distance_price = ($distance_in_unit * $type_prices->price_per_distance);
            $time_price = ($dropoff_time_in_seconds / 60) * $type_prices->price_per_time;
            $base_price = $type_prices->base_price;
            // additon of base and distance price
            $base_and_distance_price = ($base_price + $distance_price);
            $base_distance = $type_prices->base_distance;
            if ($distance_in_unit < $base_distance) {
                $base_and_distance_price = $base_price;
            }
            $subtotal_price = $base_and_distance_price + $time_price;
            // if trip distace is lessthan base distance, no need to calculate time price

            $tax_percent = get_settings('service_tax');
            $tax_amount = $subtotal_price * ($tax_percent / 100);
            $total_price = $subtotal_price + $tax_amount;
            $pickup_duration = $pickup_time_in_seconds / 60;
            $dropoff_duration = $dropoff_time_in_seconds / 60;
            $wait_duration = $wait_time_in_seconds / 60;
            $duration = $pickup_duration + $dropoff_duration + $wait_duration;

            return (object)[
                'distance' => round($distance_in_unit, 2),
                'base_distance' => $base_distance,
                'base_price' => $base_price,
                'price_per_distance' => $type_prices->price_per_distance,
                'price_per_time' => $type_prices->price_per_time,
                'distance_price' => $distance_price,
                'time_price' => $time_price,
                'subtotal_price' => $subtotal_price,
                'tax_percent' => $tax_percent,
                'tax_amount' => $tax_amount, 2,
                'total_price' => $total_price,
                'pickup_duration' => round($pickup_duration),
                'dropoff_duration' => round($dropoff_duration),
                'wait_duration' => round($wait_duration),
                'duration' => round($duration),
            ];
        }
    }

    /**
    * Check if peak time
    */
    private function checkIfPeakTime($zone_type, $ride_type)
    {
    }
    //vehicle type id should be zone_type id
    private function findNearestDriver($pick_lat, $pick_lng, $vehicle_type)
    {
        $settings = json_decode(Redis::get('settings'));

        $driver_search_radius = get_settings('driver_search_radius')?:30;

        $haversine = "(6371 * acos(cos(radians($pick_lat)) * cos(radians(latitude)) * cos(radians(longitude) - radians($pick_lng)) + sin(radians($pick_lat)) * sin(radians(latitude))))";

        $driver = Driver::whereHas('driverDetail', function ($query) use ($haversine,$driver_search_radius) {
            $query->select('driver_details.*')->selectRaw("{$haversine} AS distance")
                ->whereRaw("{$haversine} < ?", [$driver_search_radius]);
        })->where('active', 1)->where('approve', 1)->where('available', 1)->first();

        return $driver?:null;
    }

    private function db_query_previous_pickup_dropoff($pick_lat, $pick_lng, $drop_lat, $drop_lng)
    {
        return $this->db_query_nearest_distance_matrix(
            $pick_lat,
            $pick_lng,
            $drop_lat,
            $drop_lng,
            EtaConstants::PICKUP_RADIUS_IN_METERS,
            EtaConstants::DROPOFF_RADIUS_IN_METERS
        );
    }

    private function db_query_nearest_distance_matrix($pick_lat, $pick_lng, $drop_lat, $drop_lng, $radius1, $radius2)
    {
        $earth_radius = EtaConstants::EARTH_RADIUS_IN_METERS;
        $update_after = Carbon::now()->subMinute(EtaConstants::LOCATION_CACHE_TIME_IN_MINUTES)->toDateTimeString();

        // uses haversine formula for calculating distance
        $nearest_distance_matrix = DistanceMatrix::selectRaw("
      id,
      origin_addresses,
      ROUND($earth_radius *
        IFNULL(ACOS(
          COS( RADIANS(?) ) *
          COS( RADIANS(origin_lat) ) *
          COS( RADIANS(origin_lng) - RADIANS(?) ) +
          SIN( RADIANS(?) ) *
          SIN( RADIANS(origin_lat) )
        ), 0), 8) AS origin_distance,
      destination_addresses,
      ROUND($earth_radius *
        IFNULL(ACOS(
          COS( RADIANS(?) ) *
          COS( RADIANS(destination_lat) ) *
          COS( RADIANS(destination_lng) - RADIANS(?) ) +
          SIN( RADIANS(?) ) *
          SIN( RADIANS(destination_lat) )
        ), 0), 8) AS destination_distance,
      json_result", [
            $pick_lat,
            $pick_lng,
            $pick_lat,
            $drop_lat,
            $drop_lng,
            $drop_lat
        ])
            ->where("updated_at", ">=", $update_after)
            ->having("origin_distance", "<=", $radius1)
            ->having("destination_distance", "<=", $radius2)
            ->orderBy("origin_distance")
            ->orderBy("destination_distance")
            ->first();

        if (!$nearest_distance_matrix) {
            $nearest_distance_matrix =  $this->save_distance_matrix_from_google($pick_lat, $pick_lng, $drop_lat, $drop_lng, true);
        }
        return $nearest_distance_matrix;
    }
    public function save_distance_matrix_from_google($pick_lat, $pick_lng, $drop_lat, $drop_lng, $traffic)
    {
        $distance_matrix = get_distance_matrix($pick_lat, $pick_lng, $drop_lat, $drop_lng, $traffic);

        $carbonNow = Carbon::now()->toDateTimeString();

        if ($distance_matrix && $distance_matrix->status == 'OK') {
            $distance_matrix_params = [
                'origin_addresses'=>$distance_matrix->origin_addresses[0],
                'origin_lat'=>$pick_lat,
                'origin_lng'=>$pick_lng,
                'destination_addresses'=>$distance_matrix->destination_addresses[0],
                'destination_lat'=>$drop_lat,
                'destination_lng'=>$drop_lng,
                'distance'=> get_distance_text_from_distance_matrix($distance_matrix),
                'duration'=> get_duration_text_from_distance_matrix($distance_matrix),
                'json_result'=> \GuzzleHttp\json_encode($distance_matrix)
                ];
            return $stored_distance_matrix_details = DistanceMatrix::create($distance_matrix_params);
        } else {
            $this->throwCustomException('Unable to calculate distance between coordinates');
        }
    }
}
