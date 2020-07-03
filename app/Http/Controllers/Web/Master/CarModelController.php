<?php

namespace App\Http\Controllers\Web\Master;

use Illuminate\Http\Request;
use App\Models\Common\CarMake;
use App\Models\Common\CarModel;
use App\Http\Controllers\Web\BaseController;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;

class CarModelController extends BaseController
{
    protected $car_model;

    public function __construct(CarModel $car_model)
    {
        $this->car_model = $car_model;
    }

    public function index(QueryFilterContract $queryFilter)
    {
        $query = $this->car_model->query();

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        $page = trans('pages_names.carmodels');

        $main_menu = 'carmodels';

        $sub_menu = null;

        return view('admin.master.carmodels.index', compact('results', 'page', 'main_menu', 'sub_menu'));
    }

    /**
    * Create Car make View
    *
    */
    public function create()
    {
        $page = trans('pages_names.add_car_model');

        $car_makes = CarMake::get();

        $main_menu = 'carmodels';
        $sub_menu = null;

        return view('admin.master.carmodels.create', compact('page', 'main_menu', 'sub_menu', 'car_makes'));
    }

    /**
    * Store Car Make
    */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->car_model->create($request->all());

        $message = trans('succes_messages.car_make_added_succesfully');
        return redirect('carmodels')->with('success', $message);
    }

    /**
    * Edit Car Make
    *
    */
    public function getById(CarModel $car_model)
    {
        $page = trans('pages_names.edit_car_model');

        $main_menu = 'admins';
        $sub_menu = null;
        $car_makes = CarMake::get();

        return view('admin.master.carmodels.update', compact('page', 'main_menu', 'sub_menu', 'car_makes', 'car_model'));
    }

    /**
    * Update Car Make
    *
    */
    public function update(Request $request, CarModel $car_model)
    {
        $car_model->update($request->all());
        $message = trans('succes_messages.car_make_updated_succesfully');
        return redirect('carmodels')->with('success', $message);
    }

    /**
    * Car Make Delete
    */
    public function delete(CarModel $car_model)
    {
        $car_model->delete();
        $message = trans('succes_messages.car_make_updated_succesfully');
        return redirect('carmodels')->with('success', $message);
    }
}
