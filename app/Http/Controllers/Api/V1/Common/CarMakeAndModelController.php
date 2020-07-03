<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Common\CarMake;
use App\Models\Common\CarColor;
use App\Models\Common\CarModel;
use App\Http\Controllers\Api\V1\BaseController;

class CarMakeAndModelController extends BaseController
{
    protected $car_make;
    protected $car_model;

    public function __construct(CarMake $car_make, CarModel $car_model)
    {
        $this->car_make = $car_make;
        $this->car_model = $car_model;
    }

    public function getCarMakes()
    {
        return $this->respondSuccess($this->car_make->get());
    }
    public function getCarModels($make_id)
    {
        return $this->respondSuccess($this->car_model->where('make_id', $make_id)->get());
    }

    /**
    * Get Car Colors
    */
    public function getCarColors()
    {
        return $this->respondSuccess(CarColor::all());
    }
}
