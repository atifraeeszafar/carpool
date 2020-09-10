<?php

namespace App\Http\Controllers\Api\V1\User;

use Carbon\Carbon;
use App\Jobs\Notifications\PushNotification;
use App\Http\Controllers\Api\V1\BaseController;
use App\Transformers\Request\OfferedRideCustomerRequestsTransformer;

/**
 * @group Ride-Apis
 *
 * APIs for Rides
 */
class ResponseForRequestController extends BaseController
{
    /**
    * Accept/Reject for request
    * @bodyParam ride_place_id integer required ride place's id which is created by rider
    * @bodyParam ride_request_customer_id integer required ride place's id
    * @bodyParam is_accepted tinyInteger required response state of rider
    *@response {"success":true,"message":"request_rejected"}
    *@response {"success":true,"message":"request_accepted"}
    */
    public function responseRequset(ResponseForRideRequest $request)
    {
        $rider = auth()->user();

        $ride_customer_request = OfferRideCustomerRequest::where('ride_place_id', $request->ride_place_id)->where('id', $request->ride_request_customer_id)->whereHas('offeredRidePlace', function ($query) use ($request) {
            $query->where('id', $request->ride_place_id);
        })->first();

        // Validate if the user has already cancelled the request
        if ($ride_customer_request->is_cancelled_by_user) {
            // @TODO thrown an exception that is the user cancelled request already
        }

        $current = Carbon::now();
        $time = $current->toDateTimeString();
        if (!$request->is_accepted) {
            $ride_customer_request->is_accepted = false;
            $ride_customer_request->is_rejected = true;
            $ride_customer_request->rejected_at = $time;
            $ride_customer_request->save();
            $title = trans('push_notifications.trip_rejected_title');
            $body = trans('push_notifications.trip_rejected_body');

            $message = 'request_rejected';
        } else {
            $ride_place_detail = $ride_customer_request->offeredRidePlace;

            // Update no of seats occupied
            $ride_place_detail->no_of_seats_occupied += $ride_customer_request->no_of_seats_requested;
            // throw an exception if the no seats exceed
            if ($ride_place_detail->no_of_seats_occupied > $ride_place_detail->no_of_seats) {
                $this->throwCustomException('You cannot accept this request'); //@TODO change the errors
            }

            $ride_place_detail->save();

            $ride_customer_request->is_accepted = true;
            $ride_customer_request->accepted_at = $time;
            $ride_customer_request->save();

            $title = trans('push_notifications.trip_accepted_title');
            $body = trans('push_notifications.trip_accepted_body');

            $message = 'request_accepted';
        }

        $request_result =  fractal($ride_customer_request, new OfferedRideCustomerRequestsTransformer)->parseIncludes('passengerInfo');

        $pus_request_detail = $request_result->toJson();
        $push_data = ['notification_enum'=>PushEnums::TRIP_ACCEPTED_BY_RIDER,'result'=>(string)$pus_request_detail];

        $rider_info = $ride_customer_request->passengerInfo;
        $rider_info->notify(new PushNotification($title, $body, $push_data));

        return $this->respondSuccess(null, $message);
    }
}
