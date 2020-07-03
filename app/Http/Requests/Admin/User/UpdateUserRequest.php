<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest;

class UpdateUserRequest extends BaseRequest
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
            'mobile'=>'required|mobile_number|unique:users,mobile,'.$this->userdetails->id,
            'email'=>'required|email|unique:users,email,'.$this->userdetails->id,
            'address'=>'required|min:10',
            'state'=>'max:100',
            'city'=>'required',
            'country'=>'required|exists:countries,id',
            'gender'=>'required|in:male,fe-male,others',
            'postal'=>'required|numeric'

        ];
    }
}
