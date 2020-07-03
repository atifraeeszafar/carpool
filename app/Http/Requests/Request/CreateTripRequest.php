<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseRequest;

class CreateTripRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pick_lat'  => 'required',
            'pick_lng'  => 'required',
            'drop_lat'  =>'required',
            'drop_lng'  =>'required',
            'vehicle_type'=>'required|exists:zone_types,id',
            'payment_opt'=>'required|in:0,1,2',
            'pick_address'=>'required',
            'drop_address'=>'sometimes|required'
        ];
    }
}
