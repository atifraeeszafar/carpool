<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class EtaRequest extends BaseRequest
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
            'vehicle_type'=>'required|uuid|exists:zone_types,id',
        ];
    }
}
