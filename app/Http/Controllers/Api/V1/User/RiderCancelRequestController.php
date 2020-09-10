<?php

namespace App\Http\Controllers\Api\V1\User;

use Carbon\Carbon;
use App\Base\Constants\Masters\PushEnums;
use App\Jobs\Notifications\PushNotification;
use App\Http\Controllers\Api\V1\BaseController;
use App\Transformers\Request\OfferedRideCustomerRequestsTransformer;

/**
 * @group Ride-Apis
 *
 * APIs for Rides
 */
class RiderCancelRequestController extends BaseController
{
    /**
    * Cancel Request by Rider
    * @bodyParam ride_place_id integer required ride place's id which is created by rider
    * @response {"success":true,"message":"request_cancelled"}
    */
    public function cancelRequest(Request $request)
    {
        $rider_offered_request = auth()->user()->offeredRidePlace()->where('id', $request->ride_place_id)->first();

        // Validate if the user has already cancelled the request
        if ($rider_offered_request->is_cancelled_by_rider) {
            // @TODO thrown an exception that is the user cancelled request already
        }

        $current = Carbon::now();
        $time = $current->toDateTimeString();
        $rider_offered_request->is_cancelled_by_rider = true;
        $rider_offered_request->cancelled_at = $time;
        $rider_offered_request->save();

        // Get all customer of this request
        $customers = $rider_offered_request->offeredRideCustomerRequest;

        foreach ($customers as $key => $customer) {
            $notifiable_user = $customer->passengerInfo;

            $title = trans('push_notifications.trip_cancelled_by_rider_title');
            $body = trans('push_notifications.trip_cancelled_by_rider_body');

            $request_result =  fractal($customer, new OfferedRideCustomerRequestsTransformer)->parseIncludes('passengerInfo');

            $pus_request_detail = $request_result->toJson();
            $push_data = ['notification_enum'=>PushEnums::REQUEST_CANCELLED_BY_RIDER,'result'=>(string)$pus_request_detail];

            $notifiable_user->notify(new PushNotification($title, $body, $push_data));
        }

        return $this->respondSuccess(null, 'request_cancelled');
    }
}
