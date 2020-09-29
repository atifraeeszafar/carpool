<?php

namespace App\Http\Requests\Auth\Registration;

use App\Http\Requests\BaseRequest;

class UserRegistrationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'gender' => 'required|in:1,2,3',
            'city' => 'required|max:25',
            'email' => 'required|email|max:150|unique:users,email',
            // 'password' => 'required|min:6|confirmed',
            'uuid' => 'required|uuid|exists:mobile_otp_verifications,id,verified,1',
            // 'terms_condition' => 'required|boolean|in:1',
            'device_token'=>'required',
            'login_by'=>'required|in:1,2',
        ];
    }
}
