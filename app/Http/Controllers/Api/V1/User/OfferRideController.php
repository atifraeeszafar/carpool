<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\Requests\OfferedRidePlace;
use App\Http\Controllers\Api\V1\BaseController;

class OfferRideController extends BaseController
{
    protected $offer_ride_place;

    public function __construct(OfferedRidePlace $offer_ride_place)
    {
        $this->offer_ride_place = $offer_ride_place;
    }

    /**
    * Offer a Ride
    *
    */
    public function offerRide(OfferRideRequest $request)
    {
    }
}
