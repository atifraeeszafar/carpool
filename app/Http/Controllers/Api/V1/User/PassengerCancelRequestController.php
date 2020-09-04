<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\BaseController;

class PassengerCancelRequestController extends BaseController
{
    /**
    * Cancel Request
    * @bodyParam ride_place_id integer required ride place's id which is created by rider
    * @bodyParam ride_request_customer_id integer required ride place's id
    * @response {"success":true,"message":"request_cancelled"}
    */
    public function cancelRequest(Request $request)
    {
        $ride_customer_request = auth()->user()->offeredRideCustomerRequest()->where('ride_place_id', $request->ride_place_id)->where('id', $request->ride_request_customer_id)->first();

        // Validate if the user has already cancelled the request
        if ($ride_customer_request->is_cancelled_by_user) {
            // @TODO thrown an exception that is the user cancelled request already
        }
        $current = Carbon::now();
        $time = $current->toDateTimeString();

        $ride_customer_request->is_cancelled_by_user = true;

        $ride_customer_request->save();

        $ride_place_detail = $ride_customer_request->offeredRidePlace;

        // Update no of seats occupied
        $ride_place_detail->no_of_seats_occupied -= $ride_customer_request->no_of_seats_requested;

        $ride_place_detail->save();

        $rider_info = $ride_place_detail->riderInfo;

        $title = trans('push_notifications.trip_cancelled_by_user_title');
        $body = trans('push_notifications.trip_cancelled_by_user_body');

        $request_result =  fractal($ride_customer_request, new OfferedRideCustomerRequestsTransformer)->parseIncludes('passengerInfo');

        $pus_request_detail = $request_result->toJson();
        $push_data = ['notification_enum'=>PushEnums::REQUEST_CANCELLED_BY_USER,'result'=>(string)$pus_request_detail];

        $rider_info->notify(new PushNotification($title, $body, $push_data));

        return $this->respondSuccess(null, 'request_cancelled');
    }
}
