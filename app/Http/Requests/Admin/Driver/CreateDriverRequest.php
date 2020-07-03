<?php

namespace App\Http\Requests\Admin\Driver;

use App\Http\Requests\BaseRequest;

class CreateDriverRequest extends BaseRequest
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
            'mobile'=>'required|mobile_number|unique:users,mobile',
            'email'=>'required|email|unique:users,email',
            'address'=>'required|min:10',
            'state'=>'max:100',
            'city'=>'required',
            'country'=>'required|exists:countries,id',
            'gender'=>'required|in:male,female,others',
            'is_company_driver' => 'required|in:0,1',
            'company'=>'sometimes',
            'type' => 'required'

        ];
    }
}
