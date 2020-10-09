<?php

namespace App\Http\Controllers\Api\V1\User;

use Carbon\Carbon;
use App\Models\Requests\OfferedRidePlace;
use App\Models\Requests\OfferedRidePlaceStop;
use App\Http\Requests\Request\FindRideRequest;
use App\Http\Controllers\Api\V1\BaseController;
use App\Transformers\Request\OfferedRidePlaceStopsTransformer;
use App\Models\Master\UserWaitingForTrip;

/**
 * @group Ride-Apis
 *
 * APIs for Rides
 */
class FindRideController extends BaseController
{
    protected $offer_ride_place;
    protected $userWaitingForTrip;

    public function __construct(OfferedRidePlace $offer_ride_place,UserWaitingForTrip $userWaitingForTrip)
    {
        $this->offer_ride_place = $offer_ride_place;
        $this->userWaitingForTrip = $userWaitingForTrip;
    }

    /**
    * Find Ride
    * @bodyParam pickup_lat double required pickup_lat of the request
    * @bodyParam pickup_lng double required pickup_lng of the request
    * @bodyParam drop_lat double required drop_lat of the request
    * @bodyParam drop_lng double required drop_lng of the request
    * @bodyParam pickup_address string required pickup_address of the request
    * @bodyParam drop_address string required drop_address of the request
    * @bodyParam date date required date of the request(2020-09-06 00:00:00)
    * @bodyParam start_time time required start_time of the request(00:00:00)
    * @responseFile responses/requests/findRide.json
    */
    public function findRide(FindRideRequest $request)
    {
        $rider = auth()->user();

        $before_start_time = Carbon::parse($request->start_time)->subMinutes(180);
        $after_start_time = Carbon::parse($request->start_time)->addMinutes(180);

        $before_start_time_string = Carbon::parse($before_start_time)->toTimeString();
        $after_start_time_string = Carbon::parse($after_start_time)->toTimeString();

        $haversine = "(6371 * acos(cos(radians($request->pickup_lat)) * cos(radians(offered_place_stops.pickup_lat)) * cos(radians(offered_place_stops.pickup_lng) - radians($request->pickup_lng)) + sin(radians($request->pickup_lat)) * sin(radians(offered_place_stops.pickup_lat))))";

        $drop_haversine = "(6371 * acos(cos(radians($request->drop_lat)) * cos(radians(offered_place_stops.drop_lat)) * cos(radians(offered_place_stops.drop_lng) - radians($request->drop_lng)) + sin(radians($request->drop_lat)) * sin(radians(offered_place_stops.drop_lat))))";

        $poly_line_string = get_line_string($request->pickup_lat, $request->pickup_lng, $request->drop_lat, $request->drop_lng);

        $radius = 10;

        $rider_places = OfferedRidePlaceStop::
                  leftjoin('offered_ride_places','offered_ride_places.id','offered_place_stops.ride_place_id')
                ->leftjoin('users','users.id','offered_ride_places.rider_id')
                ->select('offered_place_stops.*','offered_ride_places.start_time')
                ->selectRaw("{$haversine} AS distance")
                ->whereRaw("{$haversine} < ?", [$radius])->selectRaw("{$drop_haversine} AS drop_distance")
                ->whereRaw("{$drop_haversine} < ?", [$radius])->whereHas('offeredRidePlace', function ($query) use ($request,$before_start_time_string,$after_start_time_string) {
                    $query
                    ->whereDate('date',explode(' ',$request->date)[0])
                    ->where('offered_place_stops.active', 1)
                    ->whereTime('offered_ride_places.start_time', '>', $before_start_time_string)
                    ->whereTime('offered_ride_places.start_time', '<', $after_start_time_string)
                    ;
                })->with('offeredRidePlace');
                // 
        $rider_places->where('users.gender_based_search',$rider->gender_based_search);
     
        $rider_places = $rider_places->get();
    

                // $rider_places[0]->offeredRidePlace->riderInfo->gender_based_search

        if(count($rider_places) == 0 ) {

            $userWaitingForTrip = $request->all();
            $userWaitingForTrip['user_id'] = auth()->user()->id;

            $this->userWaitingForTrip->create($userWaitingForTrip);
        }        

        $result = fractal($rider_places, new OfferedRidePlaceStopsTransformer)->parseIncludes(['riderInfo']);


        return $this->respondSuccess($result,'ride_list');
    }
}
