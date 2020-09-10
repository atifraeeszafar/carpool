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
use App\Base\Constants\Masters\OfferRideCustomerStatus;
use App\Base\Constants\Masters\PushEnums;
use App\Jobs\Notifications\PushNotification;
use App\Models\User;

/**
 * @group Ride-Apis
 *
 * APIs for Rides
 */
class RideStatusController extends BaseController
{
    protected $offerRideCustomer;

    public function __construct(OfferRideCustomerRequest $offerRideCustomer)
    {
        $this->offerRideCustomer = $offerRideCustomer;
    }

    /**
    * Initiate a trip
    * @return \Illuminate\Http\JsonResponse
     * @response {"success":true,"message":"trip_initiated"}
    *
    */
    public function initiated(OfferedRidePlace $ride)
    {

        $rider = auth()->user();

        $this->offerRideCustomer->where('ride_place_id',$ride->id)
            ->update(['status'=>OfferRideCustomerStatus::INITIATED]);

        $this->riderPush($rider,$ride,'initiated',PushEnums::INITIATED);


        $offerRideCustomers = $this->offerRideCustomer->where('ride_place_id',$ride->id)->get();

        foreach($offerRideCustomers as $offerRideCustomer)
        {
            $this->userPush($offerRideCustomer,'initiated',PushEnums::INITIATED);
        }

        return $this->respondSuccess(null,'trip_initiated');

    }

    /**
    * Start a trip
    * @return \Illuminate\Http\JsonResponse
    * @response {"success":true,"message":"trip_start"}
    *
    */
    public function tripStart(OfferRideCustomerRequest $ride)
    {

        $offerRideCustomers = $this->offerRideCustomer->user()->get();

        echo "<pre>";
        print_r($offerRideCustomers);

        die();

        $rider = auth()->user();

        $this->offerRideCustomer->where('ride_place_id',$ride->ride_place_id)
            ->update(['status'=>OfferRideCustomerStatus::TRIP_START]);

        $ride = OfferedRidePlace::find($ride->ride_place_id);

        $this->riderPush($rider,$ride,'trip_start',PushEnums::TRIP_START);

        $user = User::find($ride->user_id);

        $this->userPush($user,'trip_start',PushEnums::TRIP_START);

        return $this->respondSuccess(null,'trip_start');

    }

    
    public function tripEnd(OfferRideCustomerRequest $ride)
    {

        $rider = auth()->user();

        $this->offerRideCustomer->where('ride_place_id',$ride->ride_place_id)
            ->update(['status'=>OfferRideCustomerStatus::TRIP_START]);

        $ride = OfferedRidePlace::find($ride->ride_place_id);

        $this->riderPush($rider,$ride,'trip_start',PushEnums::TRIP_START);

        $this->userPush($ride,'trip_start',PushEnums::TRIP_START);

        return $this->respondSuccess(null,'trip_start');

    }

    public function riderPush($rider,$pus_request_detail,$status,$pushEnums)
    {

        $title = trans("push_notifications.".$status."_title");
        $body = trans("push_notifications.".$status."_body");

        $push_data = ['notification_enum'=>$pushEnums,'result'=>(string)$pus_request_detail];

        $rider->notify(new PushNotification($title, $body, $push_data));
    }

    public function userPush($offerRideCustomer,$pus_request_detail,$status,$pushEnums)
    {
   

        $title = trans("push_notifications.".$status."_title");
        $body = trans("push_notifications.".$status."_body");

        $push_data = ['notification_enum'=>$pushEnums,'result'=>(string)$pus_request_detail];

        $offerRideCustomer->notify(new PushNotification($title, $body, $push_data));

    }
    
}
