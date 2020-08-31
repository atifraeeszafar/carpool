<?php

namespace App\Http\Requests\User;

//use Illuminate\Http\Request as HttpRequest;
use App\Http\Requests\BaseRequest;

class UpdateUserByPanelRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        return [

            'name'=>'required|min:3|max:50',
            'lastname'=>'',
            'date_of_birth'=>'required',
           /*  'email'=>'required|email|unique:users,email',
            'mobile'=>'required|mobile_number|unique:users,mobile', */

            'mobile'=>'required|mobile_number|unique:users,mobile,'.$this->user_id,
            'email'=>'required|email|unique:users,email,'.$this->user_id,
            'gender'=>'required',
            'password' => ($this->password) ? 'required|min:6|confirmed' : '',
            'dial_code'=>'required',
            'city'=>'required',
        ];
    }
}
