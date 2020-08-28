<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseRequest;

class OfferRideRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pickup_lat'  => 'required',
            'pickup_lng'  => 'required',
            'drop_lat'  =>'required',
            'drop_lng'  =>'required',
            'payment_opt'=>'required|in:0,1,2',
            'pickup_address'=>'required',
            'date'=>'required|date_format:Y-m-d H:i:s',
            'time'=>'required|date_format:H:i:s',
            'drop_address'=>'sometimes|required',
            'no_of_seats'=>'sometimes|required',
        ];
    }
}
