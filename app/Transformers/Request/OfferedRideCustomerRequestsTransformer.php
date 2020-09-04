<?php

namespace App\Transformers\Request;

use App\Transformers\Transformer;
use App\Transformers\User\UserTransformer;
use App\Models\Requests\OfferRideCustomerRequest;

class OfferedRideCustomerRequestsTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'passengerInfo'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(OfferRideCustomerRequest $ride)
    {
        $params = [
            'id'=>$ride->id,
            'offerd_place_id' => $ride->ride_place_id,
            'offered_place_stops_id'=>$ride->offered_place_stops_id,
            'pickup_address'=>$ride->pickup_address,
            'drop_address'=>$ride->drop_address,
            'pickup_lat'=>$ride->pickup_lat,
            'pickup_lng'=>$ride->pickup_lng,
            'drop_lat'=>$ride->drop_lat,
            'drop_lng'=>$ride->drop_lng,
            'price'=>$ride->offeredRidePlaceStop->price,
            'no_of_seats_occupied'=>$ride->no_of_seats_requested
        ];

        return $params;
    }

    /**
    * Include the roles of the user.
    *
    * @param User $user
    * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
    */
    public function includePassengerInfo(OfferRideCustomerRequest $ride)
    {
        $passenger_info = $ride->passengerInfo;

        return $passenger_info
        ? $this->item($passenger_info, new UserTransformer)
        : $this->null();
    }
}
