<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\Master\Car;
use App\Http\Requests\Master\AddCarRequest;
use App\Http\Requests\Master\UpdateCarRequest;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Transformers\NotificationTransformer;
use App\Base\Constants\Masters\PushEnums;

/**
 * @group Car Management-Apis
 *
 * APIs for car management
 */
class NotificationController extends BaseController
{
    protected $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
    * List Notification
    */
    public function list(Request $request)
    {

        $user = auth()->user();

        $take = 10;
        $currentPage = ($request->has('page')?$request->page:0);       

        $result = $this->notification->where('user_id', auth()->user()->id)
        ->orderby('created_at','ASC')
        // ->take($take)
        // ->skip(($currentPage - 1) * $take)   
        ->paginate(10); //->groupby('id')->toArray()

        $resultInArray = $result->groupby('id')->toArray();

        $this->notification
        ->whereIn('id', array_keys($resultInArray))
        ->update(['read'=>TRUE]);
        
        $result =  fractal($result, new NotificationTransformer);


        return $this->respondSuccess($result,'notification_list');
    }

}
