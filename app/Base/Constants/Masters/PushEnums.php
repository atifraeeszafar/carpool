<?php

namespace App\Base\Constants\Masters;

class PushEnums
{

    // for driver
    const REQUESTED_TO_THE_RIDER ='requested_to_the_rider';
    const REQUEST_CANCELLED_BY_USER ='request_cancelled_by_user';
    const GENERAL_NOTIFICATION ='general_notification';
    const RIDER_ACCOUNT_APPROVED = 'rider_account_approved';
    const RIDER_ACCOUNT_DECLINED = 'rider_account_declined';
    // For User
    const TRIP_ACCEPTED_BY_RIDER = 'trip_accepted';
    const RIDER_ARRIVED = 'rider_arrived';
    const RIDER_STARTED_TO_PICKUP = 'rider_started_to_pickup';
    const RIDER_STARTED_THE_TRIP = 'rider_started_the_trip';
    const RIDER_END_THE_TRIP = 'rider_end_the_trip';
    const REQUEST_CANCELLED_BY_RIDER ='request_cancelled_by_rider';
    const NO_RIDER_FOUND ='no_driver_found';
    const TRIP_AVAILABLE ='trip_available';
    const INITIATED ='initiated';
    
}
