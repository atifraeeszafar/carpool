<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\ApiController;
use App\Transformers\User\UserTransformer;

class AccountController extends ApiController
{
    /**
     * Get the current logged in user.
     * @group User-Management
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = filter()->transformWith(new UserTransformer)
            ->customIncludes('roles')
            ->loadIncludes(auth()->user());

        return $this->respondOk($user);
    }
}
