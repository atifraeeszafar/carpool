<?php

namespace App\Http\Requests\Admin\VehicleTypes;

use App\Http\Requests\BaseRequest;

class CreateType extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|max:50|unique:vehicle_types,name',
            'base_price'=>'required|numeric|min:1',
            'distance_price'=>'required|numeric|min:1',
            'time_price'=>'required|numeric|min:1',
            'icon'=>$this->vechicleTypeImageRule(),
        ];
    }
}
