<?php

namespace App\Transformers\User;

use App\Models\User;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;
use App\Transformers\User\UserDocumentTransformer;
use App\Base\Constants\Document\DocumentStatus;

class UserTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'roles','document'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        $params = [
            'id' => $user->id,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'username' => $user->username,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'profile_picture' => $user->profile_picture,
            'active' => $user->active,
            'email_confirmed' => $user->email_confirmed,
            'mobile_confirmed' => $user->mobile_confirmed,
            'last_known_ip' => $user->last_known_ip,
            'last_login_at' => $user->last_login_at,
            'gender_based_search' =>  $user->gender_based_search,
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
            'document_status' => ($user->document()->where('document_status',DocumentStatus::APPROVED)->count() == 0)?0:1,

        ];
        if (access()->hasRole(Role::DRIVER)) {
            $params['service_location_id'] = $user->driver->service_location_id;
            $params['vehicle_type'] = $user->driver->vehicle_type;
            $params['vehicle_type_name'] = $user->driver->vehicleType?$user->driver->vehicleType->name:null;
            $params['car_make'] = $user->driver->car_make;
            $params['car_model'] = $user->driver->car_model;
            $params['car_color'] = $user->driver->car_color;
            $params['car_number'] = $user->driver->car_number;
        }
        return $params;
    }

    /**
     * Include the roles of the user.
     *
     * @param User $user
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeRoles(User $user)
    {
        $roles = $user->roles;

        return $roles
        ? $this->collection($roles, new RoleTransformer)
        : $this->null();
    }

    public function includeDocument(User $user)
    {

        $document = $user->document;

        return $this->collection($document, new UserDocumentTransformer);

        return $document
        ? $this->collection($document, new UserDocumentTransformer)
        : $this->null();
    }

    
}
