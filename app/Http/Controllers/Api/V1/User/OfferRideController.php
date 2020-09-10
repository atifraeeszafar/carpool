<?php

namespace App\Http\Controllers\Api\V1\User;

use Polyline;
use App\Models\Requests\OfferedRidePlace;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Request\OfferRideRequest;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use App\Http\Requests\Request\OfferEtaRequest;
use Carbon\Carbon;
use App\Models\Master\UserWaitingForTrip;
use App\Jobs\UserWaitingForTrip as UserWaitingForTripJob;
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

                $offered_place_stop_params = (array)$stop;
                $offered_place_stop_params['date'] = $request->date;
                $offered_place_stop_params['start_time'] = $request->start_time;

    
                // foreach ($stop as $key => $value) {
                //     $offered_place_stop_params[$key] = $value;
                // }
                
                $rider_offered_place->offeredRidePlaceStops()->create($offered_place_stop_params);

                $this->dispatch(new UserWaitingForTripJob($offered_place_stop_params));
                
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

     /**
    * Offer a Ride
    * @bodyParam pickup_lat double required pickup_lat of the request
    * @bodyParam pickup_lng double required pickup_lng of the request
    * @bodyParam drop_lat double required drop_lat of the request
    * @bodyParam drop_lng double required drop_lng of the request
    * @bodyParam pickup_address string required pickup_address of the request
    * @bodyParam drop_address string required drop_address of the request
    * @bodyParam stops json optional stops of the request
    * @return \Illuminate\Http\JsonResponse
     * @response 
     * {
     *    "status": true,
     *    "message": "eta_param_structure",
     *    "data": [
     *    {
     *       "pickup_lat": "11.0118701",
     *       "pickup_lng": "76.897194",
     *       "pickup_address": "coimbatore",
     *       "drop_lat": "11.0118701",
     *       "drop_lng": "76.897194",
     *       "drop_address": "Salem",
     *       "main_junction": false,
     *       "estimateTotal": 10,
     *       "etaDetails": {
     *           "estimateDistance": 0,
     *           "estimateDistanceAmount": 0,
     *           "estimateTime": "1 min",
     *           "estimateTimeAmount": 0
     *         }
     *      }
     *   ]
     * }
    *
    */
    public function offerEta(OfferEtaRequest $request)
    {
        $rider = auth()->user();

        $pathArray = array();

        $stops = array();
        $stops[0] = new \stdclass();
        $stops[0]->pickup_lat = $request->pickup_lat;
        $stops[0]->pickup_lng = $request->pickup_lng;
        $stops[0]->pickup_address = $request->pickup_address;

        $stopsJunction = json_decode($request->stops);

        $stops = array_merge($stops,$stopsJunction);  

        $stopsObject= new \stdclass();
        $stopsObject->pickup_lat     = $request->drop_lat;
        $stopsObject->pickup_lng     = $request->drop_lng;
        $stopsObject->pickup_address = $request->drop_address;

        $stops[] = $stopsObject;

        $result = array();

        $typePrice = $rider->car()->first()->type()->first();

        for( $i=0;$i < ( count($stops)-1); $i++ )
        {
            for( $j= ($i+1);$j<count($stops);$j++ )
            {

                $stopsObject= new \stdclass();
                $stopsObject->pickup_lat = $stops[$i]->pickup_lat;
                $stopsObject->pickup_lng = $stops[$i]->pickup_lng;
                $stopsObject->pickup_address = $stops[$i]->pickup_address;

                $stopsObject->drop_lat = $stops[$j]->pickup_lat;
                $stopsObject->drop_lng = $stops[$j]->pickup_lng;
                $stopsObject->drop_address = $stops[$j]->pickup_address;
                

                if( $stops[$i]->pickup_lat == $request->pickup_lat && $stops[$i]->pickup_lng == $request->pickup_lng && $stops[$j]->pickup_lat == $request->drop_lat && $stops[$j]->pickup_lng == $request->drop_lng ) {
                   
                    $stopsObject->main_junction = TRUE;
                
                }else {
                    $stopsObject->main_junction = FALSE;

                }

                if( $typePrice ) {

                    $googleMatrix = getDistanceMatrix($stopsObject->pickup_lat,$stopsObject->pickup_lng,$stopsObject->drop_lat,$stopsObject->drop_lng);

                    if( $googleMatrix->status == 'OK'  ) {

                        $estimateDistance = $googleMatrix->rows[0]->elements[0]->distance->value;
                        $estimateDistanceInKm = $estimateDistance / 1000;
                        $estimateDistanceAmount = $estimateDistanceInKm * $typePrice->distance_price;

                        $estimateTime = $googleMatrix->rows[0]->elements[0]->duration->value;
                        $estimateTimeInMinutes = $estimateTime * 60;
                        $estimateTimeAmount = $estimateTimeInMinutes * $typePrice->time_price;

                        $stopsObject->estimateTotal = $estimateTimeAmount + $estimateDistanceAmount + $typePrice->base_price ;

                        $etaArray = array();
                        $etaArray['estimateDistance'] = $estimateDistanceInKm;
                        $etaArray['estimateDistanceAmount'] = $estimateDistanceAmount;
                        $etaArray['estimateTime'] = $googleMatrix->rows[0]->elements[0]->duration->text;
                        $etaArray['estimateTimeAmount'] = $estimateTimeAmount;
                        
                        $stopsObject->etaDetails = $etaArray;
                    }
                    
                }else {

                    $stopsObject->estimateTotal = 0;
                    $stopsObject->baseAmount = 0;
                    $stopsObject->estimateDistance = 0;
                    $stopsObject->estimateDistanceAmount = 0;
                    $stopsObject->estimateTime = 0;
                    $stopsObject->estimateTimeAmount = 0;

                }

                $result[] = $stopsObject;

            }
        }

        return response()->json(['status'=>true,'message'=>'eta_param_structure','data'=>$result]);
    }
    
}
