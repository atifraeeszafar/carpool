<?php

namespace App\Http\Requests\Auth\Registration;

use App\Http\Requests\BaseRequest;

class DriverRegistrationRequest extends BaseRequest
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
            'last_name' => 'max:50',
            'email' => 'required|email|max:150|unique:users,email',
            'password' => 'sometimes|required|min:6|confirmed',
            'uuid' => 'required|uuid|exists:mobile_otp_verifications,id,verified,1',
            'terms_condition' => 'required|boolean|in:1',
            'device_token'=>'required',
            'login_by'=>'required|in:1,2',
            'vehicle_type'=>'required|exists:vehicle_types,id',
            'address'=>'min:15',
            'postal_code'=>'min:6|max:6',
            'car_make'=>'sometimes|required',
            'car_model'=>'sometimes|required',
            'car_color'=>'sometimes|required',
            'car_number'=>'sometimes|required',
            'is_company_driver'=>'required|boolean'
        ];
    }
}
