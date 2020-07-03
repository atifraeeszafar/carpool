<?php

namespace App\Http\Controllers\Web\Master;

use Illuminate\Http\Request;
use App\Models\Common\CarMake;
use App\Http\Controllers\Web\BaseController;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;

class CarMakeController extends BaseController
{
    protected $car_make;

    public function __construct(CarMake $car_make)
    {
        $this->car_make = $car_make;
    }

    public function index(QueryFilterContract $queryFilter)
    {
        $query = $this->car_make->query();

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        $page = trans('pages_names.carmakes');

        $main_menu = 'carmakes';

        $sub_menu = null;

        return view('admin.master.carmakes.index', compact('results', 'page', 'main_menu', 'sub_menu'));
    }

    /**
    * Create Car make View
    *
    */
    public function create()
    {
        $page = trans('pages_names.add_car_make');

        $main_menu = 'carmakes';
        $sub_menu = null;

        return view('admin.master.carmakes.create', compact('page', 'main_menu', 'sub_menu'));
    }

    /**
    * Store Car Make
    */
    public function store(Request $request)
    {
        $this->car_make->create($request->all());

        $message = trans('succes_messages.car_make_added_succesfully');
        return redirect('carmakes')->with('success', $message);
    }

    /**
    * Edit Car Make
    *
    */
    public function getById(CarMake $car_make)
    {
        $page = trans('pages_names.edit_car_make');

        $main_menu = 'admins';
        $sub_menu = null;

        return view('admin.master.carmakes.update', compact('car_make', 'page', 'main_menu', 'sub_menu'));
    }

    /**
    * Update Car Make
    *
    */
    public function update(Request $request, CarMake $car_make)
    {
        $car_make->update($request->all());
        $message = trans('succes_messages.car_make_updated_succesfully');
        return redirect('carmakes')->with('success', $message);
    }

    /**
    * Car Make Delete
    */
    public function delete(CarMake $car_make)
    {
        $car_make->delete();
        $message = trans('succes_messages.car_make_updated_succesfully');
        return redirect('carmakes')->with('success', $message);
    }
}
