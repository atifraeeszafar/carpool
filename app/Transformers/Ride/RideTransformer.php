<?php

namespace App\Transformers\Ride;

use App\Models\User;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;
use App\Models\Common\RideModel;
use App\Models\Master\RideJunctionModel;
use App\Transformers\Ride\RideJunctionTransformer;

class RideTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'junction',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(RideModel $ride)
    {
        $params = [
            'id' => $ride->id,
            'ride_id_string' => $ride->ride_id_string,
            'rider_id' => $ride->rider_id,
            'ride_date_time' => $ride->ride_date_time,
            'no_of_passengers_left' => $ride->no_of_passengers_left,
            'trip_status' => $ride->trip_status,
            // 'created_at' => $ride->created_at->toDateTimeString(),
            // 'updated_at' => $ride->updated_at->toDateTimeString(),
        ];
   
        return $params;
    }

    /**
     * Include the roles of the user.
     *
     * @param User $user
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeJunction(RideModel $ride)
    {
        $roles = $ride->rideJunction;

        return $roles
        ? $this->collection($roles, new RideJunctionTransformer)
        : $this->null();
    }
}
