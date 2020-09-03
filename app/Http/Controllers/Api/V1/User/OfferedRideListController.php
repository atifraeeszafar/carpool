<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\Requests\OfferedRidePlace;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\Requests\OfferRideCustomerRequest;
use App\Transformers\Request\OfferedRidePlaceTransformer;
use App\Transformers\Request\OfferedRideCustomerRequestsTransformer;

/**
 * @group My-Rides-Apis
 *
 * APIs for My Rides
 */
class OfferedRideListController extends BaseController
{
    protected $offered_ride_place;

    protected $offered_ride_place_customer_request;

    public function __construct(OfferedRidePlace $offered_ride_place, OfferRideCustomerRequest $offered_ride_place_customer_request)
    {
        $this->offered_ride_place = $offered_ride_place;
        $this->offered_ride_place_customer_request = $offered_ride_place_customer_request;
    }

    /**
    * List offered rides
    *
    */
    public function index()
    {
        $query = $this->offered_ride_place->where('rider_id', auth()->user()->id)->orderBy('start_time', 'desc');

        $result  = filter($query, new OfferedRidePlaceTransformer, new RequestFilter)->customIncludes(['riderInfo','coPassengers'])->paginate();

        return $this->respondSuccess($result);
    }

    /**
    * List of tagged rides
    */
    public function tagedRides()
    {
        $query = $this->offered_ride_place_customer_request->where('user_id', auth()->user()->id)->orderBy('start_time', 'desc');

        $result  = filter($query, new OfferedRideCustomerRequestsTransformer, new RequestFilter)->customIncludes($includes)->paginate();

        return $this->respondSuccess($result);
    }
}
