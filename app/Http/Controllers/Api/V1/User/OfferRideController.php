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
use App\Models\Requests\OfferRideCustomerRequest;
use App\Models\Requests\RequestRating;
use App\Http\Requests\Request\RatingRequest;
use App\Models\User;

/**
 * @group Ride-Apis
 *
 * APIs for Rides
 */
class OfferRideController extends BaseController
{
    protected $offer_ride_place;

    public function __construct(RequestRating $rating,OfferedRidePlace $offer_ride_place)
    {
        $this->offer_ride_place = $offer_ride_place;
        $this->rating = $rating;
        
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

        foreach(json_decode($request->stops) as $key => $stop) 
        {
            if( $stop->main_junction == true  ) {
        
                $request->merge(['pickup_lat' => $stop->pickup_lat]);
                $request->merge(['pickup_lng' => $stop->pickup_lng]);
                $request->merge(['pickup_address' => $stop->pickup_address]);
                $request->merge(['drop_lat' => $stop->drop_lat]);
                $request->merge(['drop_lng' => $stop->drop_lng]);
                $request->merge(['drop_address' => $stop->drop_address]);

            }
        }


        $created_params = $request->except(['stops']);

        //get line string from helper
        $poly_line_string = get_line_string($request->pickup_lat, $request->pickup_lng, $request->drop_lat, $request->drop_lng);

        $created_params['coordinates'] = $poly_line_string;

        // dD($created_params);

        $rider_offered_place = $rider->offeredRidePlace()->create($created_params);

        if ($request->has('stops')) {

            foreach (json_decode($request->stops) as $key => $stop) {

                $offered_place_stop_params = (array)$stop;
                $offered_place_stop_params['date'] = $request->date;
                $offered_place_stop_params['start_time'] = $request->start_time;

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

        $stopsList = array();

        if($request->has('stops')) {
            $stopsJunction = json_decode($request->stops);

            foreach($stopsJunction as $k => $v) {

                if( in_array($v->pickup_address,$stopsList)) {
                    unset($stopsJunction[$k]);
                }else {
                    $stopsList[] = $v->pickup_address;
                }
            }

            $stops = array_merge($stops,$stopsJunction); 
        }
  

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
                        $estimateTimeInMinutes = $estimateTime / 60;

                        $estimateTimeAmount = $estimateTimeInMinutes * $typePrice->time_price;
                        $stopsObject->currency = auth()->user()->country()->first()->currency_symbol; 

                        $stopsObject->estimateTotal = $estimateTimeAmount + $estimateDistanceAmount + $typePrice->base_price; 

                        $etaArray = array();
                        $etaArray['estimateDistance'] = $estimateDistanceInKm;
                        $etaArray['estimateDistanceAmount'] = $estimateDistanceAmount;
                        $etaArray['estimateTime'] = $googleMatrix->rows[0]->elements[0]->duration->text;
                        $etaArray['estimateTimeAmount'] = $estimateTimeAmount;
                        
                        $stopsObject->etaDetails = $etaArray;
                    }
                    
                }else {
                    $stopsObject->currency = auth()->user()->country()->first()->currency_symbol; 
                    // $rider = auth()->user()->country()->first()->name;

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

        return $this->respondSuccess(['status'=>true,'message'=>'eta_param_structure','data'=>$result],'user_rated_successfully');

        // return response()->json();
    }


    /**
    * User Rate Driver
    * @bodyParam rating integer required rating of the request
    * @bodyParam comment integer required comment of the request
    * @return \Illuminate\Http\JsonResponse
    * @response 
    * {
    *    "status": true,
    *    "message": "user_rated_successfully",
    * }  
    */
    public function userRating(OfferRideCustomerRequest $ride,RatingRequest $request)
    {
        $rider = auth()->user();

        $rider_id = $ride->offeredRidePlace()->first()->rider_id;

        $created_params['offered_ride_place_id'] = $ride->ride_place_id;
        $created_params['user_id']  = $ride->user_id;
        $created_params['rider_id'] = $rider_id;
        $created_params['rating']   = $request->rating;
        $created_params['comment']  = $request->comment;
        $created_params['user_rating'] = TRUE;

        if($rider->id != $ride->user_id) {
            $this->throwCustomException('User Mismatched');
        }
        
        $user = User::find($rider_id);
        $user->total_rating  = ( $user->total_rating + $request->rating );
        $user->no_of_rating  = ( $user->no_of_rating + 1 );
        $user->rating_average = ( $user->total_rating / $user->no_of_rating );
        $user->save();

        $this->rating->create($created_params);

        // $this->userPush($user,'trip_end',PushEnums::TRIP_END);

        return $this->respondSuccess(null,'user_rated_successfully');

    }

    /**
    * Driver Rate User
    * @bodyParam rating integer required rating of the request
    * @bodyParam comment integer required comment of the request
    * @return \Illuminate\Http\JsonResponse
    * @response 
    * {
    *    "status": true,
    *    "message": "driver_rated_successfully",
    * }  
    */
    public function driverRating(OfferRideCustomerRequest $ride,RatingRequest $request)
    {
        $rider = auth()->user();

        $rider_id = $ride->offeredRidePlace()->first()->rider_id;

        $created_params['offered_ride_place_id'] = $ride->ride_place_id;
        $created_params['user_id']  = $ride->user_id;
        $created_params['rider_id'] = $rider_id;
        $created_params['rating']   = $request->rating;
        $created_params['comment']  = $request->comment;
        $created_params['user_rating'] = TRUE;

        if($rider->id != $rider_id) {
            $this->throwCustomException('User Mismatched');
        }
        
        $user = User::find($ride->user_id);
        $user->total_rating  = ( $user->total_rating + $request->rating );
        $user->no_of_rating  = ( $user->no_of_rating + 1 );
        $user->rating_average = ( $user->total_rating / $user->no_of_rating );
        $user->save();

        $this->rating->create($created_params);

        // $this->userPush($user,'trip_end',PushEnums::TRIP_END);

        return $this->respondSuccess(null,'driver_rated_successfully');

    }

    
    
}
