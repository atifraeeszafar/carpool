<?php

namespace App\Transformers\Ride;

use App\Models\User;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;
use App\Models\Common\RideModel;
use App\Models\Master\RideJunctionModel;

class RideJunctionTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        // 'junction',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(RideJunctionModel $rideJunction)
    {
        $params = [
            'id' => $rideJunction->id,
            'ride_id' => $rideJunction->ride_id,
            
            'pick_up_location' => $rideJunction->pick_up_location,
            'pick_up_lat' => $rideJunction->pick_up_lat,
            'pick_up_lng' => $rideJunction->pick_up_lng,

            'drop_location' => $rideJunction->drop_location,
            'drop_location_lat' => $rideJunction->drop_location_lat,
            'drop_location_lng' => $rideJunction->drop_location_lng,

            'price' => round($rideJunction->price,2) ,
            'status' => $rideJunction->status,


            // 'created_at' => $rideJunction->created_at->toDateTimeString(),
            // 'updated_at' => $rideJunction->updated_at->toDateTimeString(),
        ];
   
        return $params;
    }

    
}
