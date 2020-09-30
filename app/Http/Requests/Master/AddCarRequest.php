<?php

namespace App\Http\Requests\Master;

use App\Http\Requests\BaseRequest;

class AddCarRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number_plate'=>'required|min:5',
            // 'user_id'=>'required|exists:users,id',
            'car_make'=>'required|exists:car_makes,id',
            'car_model'=>'required|exists:car_models,id',
            // 'vehicle_type'=>'required',// TODO
            'car_color'=>'required',//|exists:car_colors,id',
            'model_year'=>'required|numeric'
        ];
    }
}
