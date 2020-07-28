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
class UsersController extends BaseController
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
        $page = trans('pages_names.users');

        $main_menu = 'users';
        $sub_menu = null;

        return view('admin.users.index', compact('page', 'main_menu', 'sub_menu'));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url

        $results = array();

        return view('admin.users._users', compact('results'));
    }

    public function create()
    {
        $page = trans('pages_names.add_user');
       
        $main_menu = 'users';
        $sub_menu = null;

        return view('admin.users.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(Request $request)
    {

        $message = trans('succes_messages.promocode_added_succesfully');
        return redirect('user')->with('success', $message);
    }


    public function getById(Request $admin)
    {
        $page = trans('pages_names.edit_users');
        
        $main_menu = 'users';
        $sub_menu = null;

        return view('admin.users.update', compact('page','main_menu', 'sub_menu'));
    }


    public function update(Request $request)
    {

        $message = trans('succes_messages.promocode_updated_succesfully');
        return redirect('user')->with('success', $message);
    }

    public function delete(Request $user)
    {
        // $user->delete();

        $message = trans('succes_messages.promocode_deleted_succesfully');
        return redirect('user')->with('success', $message);
    }

    public function status(Request $user)
    {
        // $user->delete();

        $message = trans('succes_messages.promocode_status_changed_succesfully');
        return redirect('user')->with('success', $message);
    }

    
}
