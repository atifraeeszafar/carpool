<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\Master\Car;
use App\Http\Requests\Master\AddCarRequest;
use App\Http\Requests\Master\UpdateCarRequest;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\Common\CarModel;

/**
 * @group Car Management-Apis
 *
 * APIs for car management
 */
class CarController extends BaseController
{
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    /**
    * List Car
    */
    public function index()
    {
        $result =   $this->car->where('user_id', auth()->user()->id)->get();

        return $this->respondSuccess($result);
    }
    /**
    * Add Car
    */
    public function store(AddCarRequest $request)
    {

        $carModel = CarModel::find($request->car_model);

        $request->merge(["user_id"=> auth()->user()->id ]);
        $request->merge(["vehicle_type"=> $carModel->vehicle_type ]);

        $this->car->create($request->all());        
        return $this->respondSuccess();
    }

    /**
    * Car Update
    *
    */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->all());

        return $this->respondSuccess();
    }

    /**
    * Delete Car
    */
    public function delete(Car $car)
    {
        $car->delete();

        return $this->respondSuccess();
    }
}
