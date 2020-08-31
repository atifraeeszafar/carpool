<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Base\Constants\Masters\PushEnums;
use App\Jobs\Notifications\PushNotification;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Request\RequestForRideRequest;
use App\Transformers\Request\OfferedRideCustomerRequestsTransformer;

class RequestForRideController extends BaseController
{


    /**
    * Create Request
    * @bodyParam pickup_lat double required pickup_lat of the request
    * @bodyParam pickup_lng double required pickup_lng of the request
    * @bodyParam drop_lat double required drop_lat of the request
    * @bodyParam drop_lng double required drop_lng of the request
    * @bodyParam pickup_address string required pickup_address of the request
    * @bodyParam drop_address string required drop_address of the request
    * @bodyParam date date required date of the request(2020-09-06 00:00:00)
    * @bodyParam start_time time required start_time of the request(00:00:00)
    * @bodyParam no_of_seats integer required no of seats requested from user
    * @bodyParam ride_place_id integer required offered_ride_place's id of the request
    * @bodyParam offered_place_stops_id integer required offered_ride_place_stop's id of the request
    */
    public function createRequest(RequestForRideRequest $request)
    {
        $ride_place_customer_params = $request->except('no_of_seats');
        $ride_place_customer_params['no_of_seats_requested'] = $request->no_of_seats;
        $ride_place_customer_params['requested_date'] = $request->date;
        $ride_place_customer_params['requested_time'] = $request->start_time;
        //@TODO Check whether the customer has any booking on same time period
        // Validate if the customer has any booking with same ride
        $exists_ride_with_same_rider = auth()->user()->offeredRideCustomerRequest()->where('ride_place_id', $request->ride_place_id)->where('offered_place_stops_id', $request->offered_place_stops_id)->exists();

        if ($exists_ride_with_same_rider) {
            // Throw an exception
            $this->throwCustomException('You have requested already with same rider');
        }
        // store the request to the request customer's table
        $requested_ride = auth()->user()->offeredRideCustomerRequest()->create($ride_place_customer_params);

        $request_result =  fractal($requested_ride, new OfferedRideCustomerRequestsTransformer)->parseIncludes('passengerInfo');

        $pus_request_detail = $request_result->toJson();
        $push_data = ['notification_enum'=>PushEnums::REQUESTED_TO_THE_RIDER,'result'=>(string)$pus_request_detail];
        $title = trans('push_notifications.new_request_title');
        $body = trans('push_notifications.new_request_body');

        $rider_info = $requested_ride->offeredRidePlace->riderInfo;
        $rider_info->notify(new PushNotification($title, $body, $push_data));


        return $this->respondSuccess();
    }
}
