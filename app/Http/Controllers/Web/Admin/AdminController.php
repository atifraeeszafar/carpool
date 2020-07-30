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
use thiagoalessio\TesseractOCR\TesseractOCR;

/**
 * @resource Driver
 *
 * vechicle types Apis
 */
class AdminController extends BaseController
{
    /**
     * The Driver model instance.
     *
     * @var \App\Models\Admin\AdminDetail
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

        // $image ='https://user-images.githubusercontent.com/7629427/33532834-fa434742-d894-11e7-8cce-65afb26a8af0.png';
        
        // $imageTempName = tempnam(sys_get_temp_dir(), 'image-from-remote-url');
        // file_put_contents($imageTempName, file_get_contents($image));

       
        // $ocr = new TesseractOCR($imageTempName);
        // $ocr->psm(4);
        // echo $ocr->run(), PHP_EOL;

        // die();


        // $file_path = asset("assets/images/aadhaar-card_1535118724.webp");


        // $file_path = "/opt/lampp/htdocs/car-pool/public/assets/images/aadhaar-card_1535118724.webp";

        // $ocr_tamil = (new TesseractOCR($file_path))
        // // ->lang('tam')
        // ->run();

        // die($ocr_tamil);

        $page = trans('pages_names.admins');

        $main_menu = 'admin';
        $sub_menu = null;

        return view('admin.admin.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function getAllAdmin(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
            $query = AdminDetail::query();
        } else {
            $this->validateAdmin();
            $query = $this->admin_detail->where('created_by', $this->user->id);
        }

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.admin._admin', compact('results'));
    }

    /**
    * Create Admins View
    *
    */
    public function create()
    {
        $page = trans('pages_names.add_admin');
        $admins = User::doesNotBelongToRole(RoleSlug::SUPER_ADMIN)->get();

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
            $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        } else {
            $this->validateAdmin();
            $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        }

        $countries = Country::active()->get();
        // $services = ServiceLocation::active()->get();

        $main_menu = 'admin';
        $sub_menu = null;

        return view('admin.admin.create', compact('admins', 'page', 'countries', 'main_menu', 'sub_menu', 'roles'));
    }

    /**
     * Store admin.
     *
     * @param \App\Http\Requests\Admin\Driver\CreateDriverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateAdminRequest $request)
    {



        $created_params = $request->only(['service_location_id', 'first_name', 'last_name','mobile','email','address','state','city','country']);
        $created_params['pincode'] = $request->postal_code;
        $created_params['created_by'] = auth()->user()->id;

        // if ($request->input('service_location_id')) {
        //     $timezone = ServiceLocation::where('id', $request->input('service_location_id'))->pluck('timezone')->first();
        // } else {
        //     $timezone = env('SYSTEM_DEFAULT_TIMEZONE');
        // }
        $timezone = env('SYSTEM_DEFAULT_TIMEZONE');


        $user = $this->user->create(['name'=>$request->input('first_name').' '.$request->input('last_name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'mobile_confirmed'=>true,
            'timezone'=>$timezone,
            'password' => bcrypt($request->input('password'))
        ]);
        
        $user->attachRole($request->role);

        $user->admin()->create($created_params);

        if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
            $created_params['profile_picture'] = $this->imageUploader->file($uploadedFile)
                ->saveProfilePicture();
        }

        $message = trans('succes_messages.admin_added_succesfully');
        return redirect('admins')->with('success', $message);
    }


    public function getById(AdminDetail $admin)
    {
        $page = trans('pages_names.edit_admin');

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
            $roles = Role::get();
        } else {
            $this->validateAdmin();
            $roles = Role::whereNotIn('slug', RoleSlug::mobileAppRoles())->get();
        }
        // $services = ServiceLocation::active()->get();
        $countries = Country::active()->get();
        $item = $admin->first();
        $main_menu = 'admins';
        $sub_menu = null;

        return view('admin.admin.update', compact('item', 'page', 'countries', 'main_menu', 'sub_menu', 'roles'));
    }


    public function update(AdminDetail $admin, UpdateAdminRequest $request)
    {
        $updatedParams = $request->only(['service_location_id', 'first_name', 'last_name','mobile','email','address','state','city','country']);
        $updatedParams['pincode'] = $request->postal_code;

        if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
            $updated_user_params['profile_picture'] = $this->imageUploader->file($uploadedFile)
                ->saveProfilePicture();
        }

        $updated_user_params = ['name'=>$request->input('first_name').' '.$request->input('last_name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile')
        ];

        $admin->user->update($updated_user_params);

        $admin->user->attachRole($request->role);

        $admin->update($updatedParams);

        $message = trans('succes_messages.admin_updated_succesfully');
        return redirect('admins')->with('success', $message);
    }

    
    public function toggleStatus(User $user)
    {
        $status = $user->isActive() ? false: true;
        $user->update(['active' => $status]);

        $message = trans('succes_messages.admin_status_changed_succesfully');
        return redirect('admins')->with('success', $message);
    }

    public function delete(User $user)
    {
        $user->delete();

        $message = trans('succes_messages.admin_deleted_succesfully');
        return redirect('admins')->with('success', $message);
    }

    public function viewProfile(User $user)
    {
        $page = trans('pages_names.admins');

        $main_menu = 'admin';
        $sub_menu = null;

        return view('admin.admin.profile', compact('page', 'main_menu', 'sub_menu', 'user'));
    }

    public function updateProfile(UpdateProfileRequest $request, User $user)
    {
        if ($request->action == 'password') {
            $updated_user_params['password'] = bcrypt($request->input('password'));
        } else {
            $updatedParams = $request->only(['first_name', 'last_name','mobile','email','address']);

            $updated_user_params = ['name'=>$request->input('first_name').' '.$request->input('last_name'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile')
            ];

            if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
                $updated_user_params['profile_picture'] = $this->imageUploader->file($uploadedFile)
                    ->saveProfilePicture();
            }

            $user->admin->update($updatedParams);
        }

        $user->update($updated_user_params);

        $message = trans('succes_messages.admin_profile_updated_succesfully');
        return redirect('admins')->with('success', $message);
    }
}
