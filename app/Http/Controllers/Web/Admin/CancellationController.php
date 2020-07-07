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
/**
 * @resource Driver
 *
 * vechicle types Apis
 */
class CancellationController extends BaseController
{
    /**
     * The Driver model instance.
     *
     * @var \App\Models\Admin\TypesController
     */
    protected $admin_detail;

    /**
     * The User model instance.
     *
     * @var \App\Models\User
     */
    protected $user;

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
    public function __construct(AdminDetail $admin_detail, ImageUploaderContract $imageUploader, User $user)
    {
        $this->admin_detail = $admin_detail;
        $this->imageUploader = $imageUploader;
        $this->user = $user;
    }

    /**
    * Get all admins
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        $page = trans('pages_names.cancellation');

        $main_menu = 'cancellation';
        $sub_menu = null;

        return view('admin.cancellation.index', compact('page', 'main_menu', 'sub_menu'));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url

        // if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
        //     $query = AdminDetail::query();
        // } else {
        //     $this->validateAdmin();
        //     $query = $this->admin_detail->where('created_by', $this->user->id);
        // }

        // $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        $results = array();

        return view('admin.cancellation._cancellation', compact('results'));
    }

    public function create()
    {
        $page = trans('pages_names.add_cancellation');
        // $admins = User::doesNotBelongToRole(RoleSlug::SUPER_ADMIN)->get();

        // if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // } else {
        //     $this->validateAdmin();
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // }

        $main_menu = 'cancellation';
        $sub_menu = null;

        return view('admin.cancellation.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(Request $request)
    {
        // $created_params = $request->only(['service_location_id', 'first_name', 'last_name','mobile','email','address','state','city','country']);
        // $created_params['pincode'] = $request->postal_code;
        // $created_params['created_by'] = auth()->user()->id;

        // $timezone = env('SYSTEM_DEFAULT_TIMEZONE');

        // $user = $this->user->create(['name'=>$request->input('first_name').' '.$request->input('last_name'),
        //     'email'=>$request->input('email'),
        //     'mobile'=>$request->input('mobile'),
        //     'mobile_confirmed'=>true,
        //     'timezone'=>$timezone,
        //     'password' => bcrypt($request->input('password'))
        // ]);

        // $user->attachRole($request->role);

        // $user->admin()->create($created_params);

        // if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
        //     $created_params['profile_picture'] = $this->imageUploader->file($uploadedFile)
        //         ->saveProfilePicture();
        // }

        $message = trans('succes_messages.cancellation_added_succesfully');
        return redirect('cancellation')->with('success', $message);
    }


    public function getById(Request $admin)
    {
        $page = trans('pages_names.edit_cancellation');

        // if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
        //     $roles = Role::get();
        // } else {
        //     $this->validateAdmin();
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // }
        // // $services = ServiceLocation::active()->get();
        // $countries = Country::active()->get();
        // $item = $admin->first();
        
        $main_menu = 'cancellation';
        $sub_menu = null;

        return view('admin.cancellation.update', compact('page','main_menu', 'sub_menu'));
    }


    public function update(Request $admin, Request $request)
    {
        // $updatedParams = $request->only(['service_location_id', 'first_name', 'last_name','mobile','email','address','state','city','country']);
        // $updatedParams['pincode'] = $request->postal_code;

        // if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
        //     $updated_user_params['profile_picture'] = $this->imageUploader->file($uploadedFile)
        //         ->saveProfilePicture();
        // }

        // $updated_user_params = ['name'=>$request->input('first_name').' '.$request->input('last_name'),
        //     'email'=>$request->input('email'),
        //     'mobile'=>$request->input('mobile')
        // ];

        // $admin->user->update($updated_user_params);

        // $admin->user->attachRole($request->role);

        // $admin->update($updatedParams);

        $message = trans('succes_messages.cancellation_updated_succesfully');
        return redirect('cancellation')->with('success', $message);
    }

    public function delete(Request $user)
    {
        // $user->delete();

        $message = trans('succes_messages.cancellation_deleted_succesfully');
        return redirect('cancellation')->with('success', $message);
    }

    public function status(Request $user)
    {
        // $user->delete();

        $message = trans('succes_messages.cancellation_status_changed_succesfully');
        return redirect('cancellation')->with('success', $message);
    }

    
}
