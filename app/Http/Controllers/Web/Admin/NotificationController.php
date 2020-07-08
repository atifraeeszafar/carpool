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
class NotificationController extends BaseController
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
        $page = trans('pages_names.notification');

        $main_menu = 'notification';
        $sub_menu = null;

        return view('admin.notification.index', compact('page', 'main_menu', 'sub_menu'));
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

        return view('admin.notification._notification', compact('results'));
    }


    public function delete(Request $user)
    {
        // $user->delete();

        $message = trans('succes_messages.notification_deleted_succesfully');
        return redirect('notification')->with('success', $message);
    }

    public function status(Request $user)
    {
        // $user->delete();

        $message = trans('succes_messages.notification_status_changed_succesfully');

        return redirect('notification')->with('success', $message);
    }

    public function create()
    {
        $page = trans('pages_names.send_notification');

        $main_menu = 'notification';
        $sub_menu = null;

        return view('admin.notification.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(Request $request)
    {
        

        $message = trans('succes_messages.notification_sended_succesfully');
        return redirect('notification')->with('success', $message);
    }
}
