<?php

namespace App\Http\Requests\Auth\App;

use App\Http\Requests\BaseRequest;

class GenericAppLoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id'     => 'sometimes|required',
            'client_secret' => 'sometimes|required',
            'email'         => 'sometimes|required|email|exists:users,email',
            'password'      => 'sometimes|required',
        ];
    }
}
