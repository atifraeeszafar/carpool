<?php

namespace App\Http\Controllers\Api\V1\User;

use Polyline;
use App\Models\Requests\OfferedRidePlace;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Request\OfferRideRequest;
use Grimzy\LaravelMysqlSpatial\Types\LineString;

/**
 * @group Ride-Apis
 *
 * APIs for Rides
 */
class OfferRideController extends BaseController
{
    protected $offer_ride_place;

    public function __construct(OfferedRidePlace $offer_ride_place)
    {
        $this->offer_ride_place = $offer_ride_place;
    }

    /**
    * Offer a Ride
    * @bodyParam pickup_lat double required pickup_lat of the request
    * @bodyParam pickup_lng double required pickup_lng of the request
    * @bodyParam drop_lat double required drop_lat of the request
    * @bodyParam drop_lng double required drop_lng of the request
    * @bodyParam pickup_address string required pickup_address of the request
    * @bodyParam drop_address string required drop_address of the request
    * @bodyParam date date required date of the request(2020-09-06 00:00:00)
    * @bodyParam start_time time required start_time of the request(00:00:00)
    * @bodyParam stops json optional stops of the request
    * @bodyParam frequent_days string optional frequent days of the request, param can be comma separated.eg:Monday,Tuesday
    * @return \Illuminate\Http\JsonResponse
     * @response {"success":true,"message":"success"}
    *
    */
    public function offerRide(OfferRideRequest $request)
    {
        $rider = auth()->user();

        $created_params = $request->except(['stops']);

        //get line string from helper
        $poly_line_string = get_line_string($request->pickup_lat, $request->pickup_lng, $request->drop_lat, $request->drop_lng);

        $created_params['coordinates'] = $poly_line_string;

        $rider_offered_place = $rider->offeredRidePlace()->create($created_params);

        if ($request->has('stops')) {
            foreach (json_decode($request->stops) as $key => $stop) {
                foreach ($stop as $key => $value) {
                    $offered_place_stop_params[$key] = $value;
                }
                
                $rider_offered_place->offeredRidePlaceStops()->create($offered_place_stop_params);
            }
        }


        if ($request->has('frequent_days')) {
            $frequent_days = explode(',', $request->frequent_days);

            foreach ($frequent_days as $key => $value) {
                $rider_offered_place->offeredRidePlaceFrequentDays()->create(['available_days'=>$value]);
            }
        }

        return $this->respondSuccess();
    }
}
