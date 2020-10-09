<?php

namespace App\Transformers\Request;

use App\Transformers\Transformer;
use App\Transformers\User\UserTransformer;
use App\Models\Requests\OfferedRidePlaceStop;

class OfferedRidePlaceStopsTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'riderInfo'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(OfferedRidePlaceStop $ride)
    {

        $params = [
            'id'=>$ride->id,
            'offerd_place_id' => $ride->ride_place_id,
            'pickup_address'=>$ride->pickup_address,
            'drop_address'=>$ride->drop_address,
            'pickup_lat'=>$ride->pickup_lat,
            'pickup_lng'=>$ride->pickup_lng,
            'drop_lat'=>$ride->drop_lat,
            'drop_lng'=>$ride->drop_lng,
            'currency' => auth()->user()->country()->first()->currency_symbol,
            'price'=>$ride->price,
            'start_at'=>$ride->start_at,
            'end_at'=>$ride->end_at,
            'no_of_seats_occupied'=>$ride->offeredRidePlace->no_of_seats_occupied
        ];

        return $params;
    }

    /**
    * Include the roles of the user.
    *
    * @param User $user
    * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
    */
    public function includeRiderInfo(OfferedRidePlaceStop $ride)
    {
        $rider = $ride->offeredRidePlace->riderInfo;

        return $rider
        ? $this->item($rider, new UserTransformer)
        : $this->null();
    }
}
