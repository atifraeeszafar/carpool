<?php

namespace App\Http\Requests\Admin\VehicleTypes;

use App\Http\Requests\BaseRequest;

class CreateVehicleTypeRequest extends BaseRequest
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
            'icon'=>$this->vechicleTypeImageRule(),
            'capacity'=>'required|min:1',
            // 'is_accept_share_ride'=>'required|boolean',
        ];
    }
}
