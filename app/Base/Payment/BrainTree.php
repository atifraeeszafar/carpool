<?php

namespace App\Base\Payment;

use App\Base\Payment\PaymentInterface;
use App\Models\Payment\CardInfo;
use Braintree\Gateway;
use App\Base\Payment\BrainTreeTasks\BraintreeTask;
use Illuminate\Http\Request;
use Validator;

/**
 * Class BrainTree
 *
 */
class BrainTree implements PaymentInterface {

	public static $gateway;

	protected $user;

	public function __construct() {
		
		$this->user = auth()->user();

	}

	public function addCard($request) {

		$user = auth()->user();
		
		$exist_card = CardInfo::where('user_id', $request->user_id)->where('last_number', $request->last_number)->exists();

		if ($exist_card) {

            $this->throwCustomValidationException("Added card is already exists.", 'last_number');
				
		}

			try {

			$create_customer_data = [
				'firstName' => $user->name,
				'lastName' => NULL,
				'email' => $user->email,
				'phone' => $user->mobile,
				'paymentMethodNonce' => $request->payment_nonce,
				'id' => "customer_" . rand(100, 1000) . "_" . $user->id];

			$result = $this->createCustomerForUser($create_customer_data, $request);

			$created_card = CardInfo::create($result);			

			$cards = CardInfo::where('user_id',$user->id)->get();
			
			return $cards;

		} catch (Exception $e) {
			
			// @TODO send an exceptipon
		}

	}

	/**
	* Create customer in braintree for user 
	*
	*/
	public function createCustomerForUser(array $create_customer_data,$request)
	{	

		$braintree_object = new BraintreeTask();
		$gateway = $braintree_object->run();

		$result = $gateway->customer()->create($create_customer_data);

		$count = CardInfo::where('user_id', $this->user->id)->where('is_default', true)->count();

		$create_card_data = [
			'customer_id' => $result->customer->id,
			'merchant_id' => $result->customer->merchantId,
			'card_token' => $result->customer->creditCards[0]->token,
			'last_number' => $request->last_number,
			'card_type' => $request->card_type ?: "VISA",
			'user_id' => $this->user->id,
			'is_default' => $count == 0 ? true : false,
			'user_role' => $request->user_role
		];

		return $create_card_data;

	}

	/**
	* List Payment Cards
	*
	*/
	public function listCards(){

		return $card_details = CardInfo::where('user_id',$this->user->id)->get();
	}

	/**
	* Make Card as Default
	*
	*/
	public function makeDefaultCard(Request $request)
	{
		$card_info = CardInfo::where('user_id',$this->user->id)->where('is_default',true)->first();

		if($card_info){

			$card_info->is_default = false;

			$card_info->save();

		}

		CardInfo::where('id',$request->card_id)->where('user_id',$this->user->id)->update(['is_default'=>true]);

		return;

	}

	/**
	* Delete card
	*
	*/
	public function deleteCard(CardInfo $card){

		if($card->is_default){

			// @TODO send an exception i.e you cannot delete your default card
		}
		
		$card->delete();
		
	}
}