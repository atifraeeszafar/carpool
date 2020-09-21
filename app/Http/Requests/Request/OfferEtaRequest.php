<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseRequest;

class OfferEtaRequest extends BaseRequest
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
            'pickup_address'=>'required',
            // 'date'=>'sometimes|required|date_format:Y-m-d H:i:s',
            // 'start_time'=>'required|date_format:H:i:s',
            'drop_address'=>'required',
            // 'no_of_seats'=>'sometimes|required',
        ];
    }
}
