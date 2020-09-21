<?php

namespace App\Http\Controllers\Api\V1\Payment;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Payment\CardInfo;

/**
 * @group Payment
 *
 * Payment-Related Apis
 */
class PaymentController extends ApiController
{
    protected $gateway;

    protected $callable_gateway_class;


    public function __construct()
    {
        $this->gateway = env('PAYMENT_GATEWAY');
        $this->callable_gateway_class = app(config('base.payment_gateway.'.$this->gateway.'.class'));
    }

    /**
    * User-Add Card
    * @bodyParam payment_nonce string required  Payment nonce fron entered value
    * @bodyParam last_number integer required Last numbers of card i.e cvv
    * @bodyParam user_role string required user role
    * @return \Illuminate\Http\JsonResponse
    * @response {
    *"success": true,
    *"message": "success",
    *"data": [
    *{
    *"id": "33f6a61d-4ddc-47dc-a601-250672dbc405",
    *"customer_id": "customer_765_6",
    *"merchant_id": "pwc2hd46g93s4zy2",
    *"card_token": "79dhmq",
    *"last_number": 521,
    *"card_type": "VISA",
    *"user_id": 6,
    *"is_default": 0,
    *"user_role": "driver",
    *"created_at": "2019-05-06 13:17:40",
    *"updated_at": "2019-05-06 13:17:40",
    *"deleted_at": null
    *}
    *]
    *}
    */
    public function addCard(Request $request)
    {
        $result =  $this->callable_gateway_class->addUserCard($request);

        return $this->respondSuccess($result);
    }

    /**
    * List cards
    * @return \Illuminate\Http\JsonResponse
    * @response {
    "success": true,
    "message": "success",
    "data": [
        {
            "id": "33f6a61d-4ddc-47dc-a601-250672dbc405",
            "customer_id": "customer_765_6",
            "merchant_id": "pwc2hd46g93s4zy2",
            "card_token": "79dhmq",
            "last_number": 521,
            "card_type": "VISA",
            "user_id": 6,
            "is_default": 0,
            "user_role": "driver",
            "created_at": "2019-05-06 13:17:40",
            "updated_at": "2019-05-06 13:17:40",
            "deleted_at": null
        }
    ]
}
    */
    public function listCards()
    {
        $result =  $this->callable_gateway_class->listCards();

        return $this->respondSuccess($result);
    }

    /**
    * Make card as default card
    * @response {
    * "success": true,
    * "message": "success"
    }
    */
    public function makeDefaultCard(Request $request)
    {
        $this->callable_gateway_class->makeDefaultCard($request);

        return $this->respondSuccess();
    }


    /**
    * Delete Card
    * @response {
    * "success": true,
    * "message": "success"
    * }
    */
    public function deleteCard(CardInfo $card)
    {
        $this->callable_gateway_class->deleteCard($card);

        return $this->respondSuccess();
    }
}
