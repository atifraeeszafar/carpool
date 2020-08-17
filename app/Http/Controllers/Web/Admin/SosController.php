<?php

namespace App\Http\Controllers\Web\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Master\Sos;
use App\Models\Access\Role;
use Illuminate\Http\Request;
use App\Models\Admin\Company;
use App\Models\Admin\AdminDetail;
use App\Models\Admin\ServiceLocation;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Master\SosRequest;
use App\Http\Controllers\Web\BaseController;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Requests\Admin\Driver\CreateDriverRequest;
use App\Http\Requests\Admin\Driver\UpdateDriverRequest;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Http\Requests\Admin\AdminDetail\CreateAdminRequest;
use App\Http\Requests\Admin\AdminDetail\UpdateAdminRequest;
use App\Http\Requests\Admin\AdminDetail\UpdateProfileRequest;
/**
 * @resource Driver
 *
 * vechicle types Apis
 */
class SosController extends BaseController
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
     * The
     *
     * @var App\Models\Master\Sos
     */ 

    protected $model;


    /**
     * DriverController constructor.
     *
     * @param \App\Models\Admin\AdminDetail $admin_detail
     */
    public function __construct(AdminDetail $admin_detail, ImageUploaderContract $imageUploader, User $user,Sos $sos)
    {

        
        $this->admin_detail = $admin_detail;
        $this->imageUploader = $imageUploader;
        $this->user = $user;
        $this->model =$sos;


    }

    /**
    * Get all admins
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        $page = trans('pages_names.sos');

        $main_menu = 'sos';
        $sub_menu = null;

        return view('admin.sos.index', compact('page', 'main_menu', 'sub_menu'));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
             $query = $this->model::query();
         } else {
           $this->validateAdmin();
             $query = $this->admin_detail->where('created_by', $this->user->id);
        }

       $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.sos._sos', compact('results'));
    }

    public function create()
    {
        $page = trans('pages_names.add_sos');
        // $admins = User::doesNotBelongToRole(RoleSlug::SUPER_ADMIN)->get();

        // if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // } else {
        //     $this->validateAdmin();
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // }

        $main_menu = 'sos';
        $sub_menu = null;

        return view('admin.sos.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(SosRequest $request)
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
        $insert_data= $request->only($this->model->getFillable());
        $insert_data['created_by']=auth()->user()->id;
            
        $this->model->create($insert_data);


        $message = trans('succes_messages.sos_added_succesfully');
        return redirect('sos')->with('success', $message);
    }


    public function getById(Request $request)
    {
        $page = trans('pages_names.edit_sos');

        // if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
        //     $roles = Role::get();
        // } else {
        //     $this->validateAdmin();
        //     $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        // }
        // // $services = ServiceLocation::active()->get();
        // $countries = Country::active()->get();
        // $item = $admin->first();
        
        $main_menu = 'sos';
        $sub_menu = null;

        $result=$this->model->find($request->id);

        if(empty($result)){

            $message = "Invalid Input";
            return redirect('sos')->with('success', $message);
        }


        return view('admin.sos.update', compact('page','main_menu', 'sub_menu','result'));
    }


    public function update(SosRequest $request,$id)
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

        $insert_data= $request->only($this->model->getFillable());
            

        $this->model->where('id',$id)->update($insert_data); 


        $message = trans('succes_messages.sos_updated_succesfully');
        return redirect('sos')->with('success', $message);
    }

    public function delete(Request $request)
    {
        // $user->delete();

        $data= $this->model::where('id',$request->id)->first();

        if($data){
           $data->delete();
        }

        $message = trans('succes_messages.sos_deleted_succesfully');
        return redirect('sos')->with('success', $message);
    }

    public function status(Request $request)
    {
        // $user->delete();

        $data=$this->model->find($request->id);
        $data->is_active= ! $data->is_active;
        $data->save();

        $message = trans('succes_messages.sos_status_changed_succesfully');
        return redirect('sos')->with('success', $message);
    }

}
