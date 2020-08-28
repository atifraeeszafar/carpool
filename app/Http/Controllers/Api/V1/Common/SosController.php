<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Master\Sos;
use App\Http\Controllers\Api\V1\BaseController;

/**
 * @group Car Management-Apis
 *
 * APIs for car management
 */
class SosController extends BaseController
{
     /**
     * Sos list
     * @group Common
     *
     * @return \Illuminate\Http\JsonResponse

     * @response {
  
  "success": true,
  "message": "success",
  "data": [
    {
      "id": "48f77ce3-9aaa-4aa0-96d8-c2492ff42cab",
      "name": "ambulance",
      "number": "108",
      "created_by": 1,
      "extras": null,
      "is_active": 1,
      "deleted_at": null,
      "created_at": "2020-08-17 10:53:46",
      "updated_at": "2020-08-27 10:41:34"
    }
  ]
}

     */
    protected $sos;

    public function __construct(Sos $sos_model)
    {
        $this->sos = $sos_model;
       
    }
    /**
    * Lis Car Makes
    */
    public function getSosList()
    {

        return $this->respondSuccess($this->sos->where('is_active',1)->get());
    }
   
}
