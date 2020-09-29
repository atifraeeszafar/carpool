<?php

namespace App\Http\Controllers\Web\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Access\Role;
use Illuminate\Http\Request;
use App\Models\Admin\Company;
use App\Models\Admin\AdminDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\ServiceLocation;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Web\BaseController;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\User\CreateUserByPanelRequest;
use App\Http\Requests\User\UpdateUserByPanelRequest;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Requests\Admin\Driver\CreateDriverRequest;
use App\Http\Requests\Admin\Driver\UpdateDriverRequest;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Http\Requests\Admin\AdminDetail\CreateAdminRequest;
use App\Http\Requests\Admin\AdminDetail\UpdateAdminRequest;
use App\Http\Requests\Admin\AdminDetail\UpdateProfileRequest;
use App\Models\UserDocuments;
use App\Base\Constants\Document\Document;
use App\Base\Constants\Masters\PushEnums;
use App\Jobs\Notifications\PushNotification;
use App\Base\Constants\Document\DocumentStatus;

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
    
    
    public function approveDocument(UserDocuments $userDocument)
    {
        $userDocument->document_status = DocumentStatus::APPROVED;
        $userDocument->save();


        $push_data = ['notification_enum'=>PushEnums::DOCUMENT_APPROVED,'result'=>(string)$userDocument];
        
        $title = trans('push_notifications.document_approved_title');
        
        $body = trans('push_notifications.document_approved_body');

        $user = User::find($userDocument->user_id);

        // $user->notify(new PushNotification($title, $body, $push_data));

        $message = trans('succes_messages.user_document_approved_successfully');

        return redirect()->back()->with('success', $message);

    }

    public function rejectDocument(UserDocuments $userDocument)
    {
        $userDocument->document_status = DocumentStatus::REJECTED;
        $userDocument->save();


        $push_data = ['notification_enum'=>PushEnums::DOCUMENT_REJECTED,'result'=>(string)$userDocument];
        
        $title = trans('push_notifications.document_rejected_title');
        
        $body = trans('push_notifications.document_rejected_body');

        $user = User::find($userDocument->user_id);

        // $user->notify(new PushNotification($title, $body, $push_data));

        $message = trans('succes_messages.user_document_rejected_successfully');

        return redirect()->back()->with('success', $message);

    }

    public function getDocument(User $user)
    {
        $page = trans('pages_names.user').' '.trans('pages_names.document');

        $main_menu = 'users';
        $sub_menu = null;

        return view('admin.users.document_index', compact('user','page', 'main_menu', 'sub_menu'));
    }

    public function fetchDocument(User $user,QueryFilterContract $queryFilter)
    {   
        
        // $query = $this->user->belongsToRole('USER')->orderBy('created_at','desc');

        $query =  UserDocuments::where('user_id', $user->id)->orderBy('created_at','desc');

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        echo "<pre>";
        print_r( $results[0]->documentImage()->get() );

        die();

        return view('admin.users._document', compact('results'));
    }

    

    public function fetch(QueryFilterContract $queryFilter)
    {
        $url = request()->fullUrl(); //get full url


// $searchResults = $this->model->getModel()->search($request->input('search'))->orderBy('created_at','desc')->paginate(get_pegination());

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
           
         
            $query = $this->user->belongsToRole('USER')->orderBy('created_at','desc');

         } else {
           $this->validateAdmin();
             $query = $this->user->belongsToRole('USER')->where('created_by', $this->user->id)->orderBy('created_at','desc');
        }

        
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        

        return view('admin.users._users', compact('results'));


    }

    public function create()
    {
        $page = trans('pages_names.add_user');
       
        $main_menu = 'users';
        $sub_menu = null;

        return view('admin.users.create', compact('page','main_menu', 'sub_menu'));
    }

    public function store(CreateUserByPanelRequest $request)
    {

     $time = strtotime($request->date_of_birth);

     $format_date_of_birth = date('Y-m-d',$time);
     DB::beginTransaction();
     try {
     $user = $this->user->create([
        'name' => $request->input('name'),
        'lastname' => ($request->has('lastname')) ? $request->input('lastname') : null,
        'email' => $request->input('email'),
        'gender' => $request->input('gender'),
        'dial_code' => $request->input('dial_code'),
        'mobile' => $request->input('mobile'),
        'password' => bcrypt($request->input('password')),
        'city' => $request->input('gender'),
        'date_of_birth' => $format_date_of_birth,

        'mobile_confirmed' => true,
        
    ]);

    $user->attachRole(RoleSlug::USER);
}
    catch (\Exception $e) {
        DB::rollBack();
        Log::error($e);
        Log::error('Error while Registering a user account. Input params : ' . json_encode($request->all()));
        return $this->respondBadRequest('Unknown error occurred. Please try again later or contact us if it continues.');
    }
    DB::commit();
        $message = trans('succes_messages.user_added_succesfully');
        return redirect('user')->with('success', $message);
    }



    public function getById(Request $request)
    {
        $page = trans('pages_names.edit_users');
        
        $main_menu = 'users';
        $sub_menu = null;


        $result=$this->user->find($request->id);
       // $result=$this->user->find($request->id);

        if(empty($result)){

            $message = "Invalid Input";
            return redirect('user')->with('success', $message);
        }

        return view('admin.users.update', compact('page','main_menu', 'sub_menu','result'));
    }


    public function update(UpdateUserByPanelRequest $request,$id)
    {
        $result=$this->user->where('id',$id)->first();
        if(empty($result)){

            $message = "Invalid Input";
            return redirect('user')->with('success', $message);
        }

if($request->has('name')){
    $result->name= $request->name;
}

if($request->has('lastname')){

    $result->lastname= $request->lastname;
}

if($request->has('email') && ($result->email !=  $request->email)){

    $result->email= $request->email;
}

if($request->has('dial_code')){

    $result->dial_code= $request->dial_code;
}

if($request->has('mobile') && ($result->mobile !=  $request->mobile) ){

    $result->mobile= $request->mobile;
}

if($request->has('gender') ){

    $result->gender= $request->gender;
}

if($request->has('password')){
    $result->password= bcrypt($request->password);
}

if($request->has('city')){
    $result->city= $request->city;
}

if($request->has('date_of_birth')){

    $time = strtotime($request->date_of_birth);

     $format_date_of_birth = date('Y-m-d',$time);

     $result->date_of_birth= $format_date_of_birth;
}

$result->save();


        $message = trans('succes_messages.user_updated_succesfully');
        return redirect('user')->with('success', $message);
    }

    public function delete(Request $request)
    {
        // $user->delete();

        $data= $this->user::where('id',$request->id)->first();

        if($data){
           $data->delete();
        }

        $message = trans('succes_messages.user_deleted_succesfully');
        return redirect('user')->with('success', $message);
    }

    public function status(Request $request)
    {

        $data=$this->user->find($request->id);

        if( $data->active == 0 && $data->document()->where('document_status',DocumentStatus::APPROVED)->count()  == 0) {
            $message = "Atleast One Document Required to Approve User";
            return redirect()->back()->with('success', $message);
        }

        $data->active= ! $data->active;
        $data->save();

        $message = trans('succes_messages.user_status_changed_succesfully');
        return redirect('user')->with('success', $message);
    }

    
}