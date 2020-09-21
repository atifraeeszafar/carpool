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
     
        $main_menu = 'sos';
        $sub_menu = null;

        return view('admin.sos.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(SosRequest $request)
    {
        $insert_data= $request->only($this->model->getFillable());
        $insert_data['created_by']=auth()->user()->id;
            
        $this->model->create($insert_data);


        $message = trans('succes_messages.sos_added_succesfully');
        return redirect('sos')->with('success', $message);
    }


    public function getById(Request $request)
    {
        $page = trans('pages_names.edit_sos');

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

        $insert_data= $request->only($this->model->getFillable());
            

        $this->model->where('id',$id)->update($insert_data); 


        $message = trans('succes_messages.sos_updated_succesfully');
        return redirect('sos')->with('success', $message);
    }

    public function delete(Request $request)
    {
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
