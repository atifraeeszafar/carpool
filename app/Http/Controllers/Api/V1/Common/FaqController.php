<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Master\Faq;
use App\Http\Controllers\Api\V1\BaseController;

/**
 * @group Car Management-Apis
 *
 * APIs for car management
 */
class FaqController extends BaseController
{
     /**
     * Faq list
     * @group Common
     *
     * @return \Illuminate\Http\JsonResponse

     * @response {
   {
  "success": true,
  "message": "success",
  "data": [
    {
      "id": "64c25b81-ce83-4431-815e-a8ff604814dd",
      "question": "test",
      "answer": "hi there",
      "created_by": 1,
      "extras": null,
      "is_active": 1,
      "deleted_at": null,
      "created_at": "2020-08-17 12:58:15",
      "updated_at": "2020-08-17 12:58:41"
    },
    {
      "id": "91c62bfb-90be-46f1-837c-5053990937f5",
      "question": "Server issue",
      "answer": "contact admin",
      "created_by": 1,
      "extras": null,
      "is_active": 1,
      "deleted_at": null,
      "created_at": "2020-08-17 11:03:36",
      "updated_at": "2020-08-28 14:36:39"
    },
    {
      "id": "974766db-a088-4630-8770-c7cc9bd61106",
      "question": "Are able to make a request",
      "answer": "No means make feed back",
      "created_by": 1,
      "extras": null,
      "is_active": 1,
      "deleted_at": null,
      "created_at": "2020-08-27 10:24:47",
      "updated_at": "2020-08-28 14:37:51"
    }
  ]
} 
}
     */
    protected $faq;

    public function __construct(Faq $faq_model)
    {
        $this->faq = $faq_model;
       
    }
    /**
    * Lis Car Makes
    */
    public function getFaqList()
    {

        return $this->respondSuccess($this->faq->where('is_active',1)->get());
    }
   
}
