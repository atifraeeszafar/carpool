<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseRequest;

class ResponseForRideRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ride_place_id'=>'required|exists:offered_ride_places,id',
            'ride_request_customer_id'=>'required|exists:offered_ride_customer_requests,id',
            'is_accepted'=>'required|in:0,1',
        ];
    }
}
