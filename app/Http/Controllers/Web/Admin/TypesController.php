<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Web\BaseController;
use App\Http\Requests\Admin\Driver\CreateDriverRequest;
use App\Http\Requests\Admin\Driver\UpdateDriverRequest;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Models\Admin\AdminDetail;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Models\User;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Http\Requests\Admin\AdminDetail\CreateAdminRequest;
use App\Http\Requests\Admin\AdminDetail\UpdateAdminRequest;
use App\Http\Requests\Admin\AdminDetail\UpdateProfileRequest;
use App\Models\Admin\Company;
use App\Models\Country;
use App\Models\Access\Role;
use App\Models\Admin\ServiceLocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VehicleTypes\CreateType;
use App\Models\Admin\Types;
use thiagoalessio\TesseractOCR\TesseractOCR;
use App\Base\Services\ImageUploader\ImageUploader;

/**
 * @resource Driver
 *
 * vechicle types Apis
 */
class TypesController extends BaseController
{
    
    /**
     * The User model instance.
     *
     * @var \App\Models\User
     */
    protected $type;

    /**
     * The
     *
     * @var App\Base\Services\ImageUploader\ImageUploaderContract
     */
    protected $imageUploader;


    /**
     * DriverController constructor.
     *
     * @param \App\Models\Admin\AdminDetail $admin_detail
     */
    public function __construct(Types $type, ImageUploaderContract $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        $this->type = $type;
    }

    /**
    * Get all admins
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        $page = trans('pages_names.types');

        $main_menu = 'types';
        $sub_menu = null;

        return view('admin.types.index', compact('page', 'main_menu', 'sub_menu'));
    }


    public function fetch(QueryFilterContract $queryFilter, Request $request)
    {

        $url = request()->fullUrl(); 

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
            $query = $this->type->query();
        } else {
            $this->validateAdmin();
            $query = $this->type->where('created_by', $this->user->id);
        }

        // if($request->has('search')) {

        //     $query =  $query->where('name', 'like', '%' . $request->search . '%');
        // }

    
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.types._types', compact('results'));
    }

    public function create()
    {
        $page = trans('pages_names.add_types');

        $main_menu = 'types';
        $sub_menu = null;

        return view('admin.types.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(CreateType $request)
    {

        $created_params = $request->only(['name', 'base_price', 'distance_price','time_price']);

        if ($uploadedFile = $this->getValidatedUpload('icon', $request)) {

            $filename = $this->imageUploader->file($uploadedFile)
                ->saveTypesPicture();

            $created_params['icon']  = $filename;
            $image = asset('storage/'.config('base.types.upload.images.path').$filename);
            
        }
        
        $user = $this->type->create($created_params);
    
        $message = trans('succes_messages.types_added_succesfully');
        return redirect('types')->with('success', $message);
    }


    public function getById(Types $type)
    {
        $page = trans('pages_names.edit_types');

        // if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
        //     $roles = Role::get();
        // } else {
        //     $this->validateAdmin();
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // }
        // // $services = ServiceLocation::active()->get();
        // $countries = Country::active()->get();
        // $item = $admin->first();
        
        $main_menu = 'types';
        $sub_menu = null;

        return view('admin.types.update', compact('type','page','main_menu', 'sub_menu'));
    }


    public function update(Types $type, Request $request)
    {

        $created_params = $request->only(['name', 'base_price', 'distance_price','time_price']);

        if ($uploadedFile = $this->getValidatedUpload('icon', $request)) {

            $filename = $this->imageUploader->file($uploadedFile)
                ->saveTypesPicture();

            $created_params['icon']  = $filename;
            $image = asset('storage/'.config('base.types.upload.images.path').$filename);
            
        }
        
        $user = $type->update($created_params);

        $message = trans('succes_messages.types_updated_succesfully');
        
        return redirect('types')->with('success', $message);
    }

    public function delete(Types $type)
    {
        $type->delete();

        $message = trans('succes_messages.types_deleted_succesfully');
        return redirect('types')->with('success', $message);
    }
}
