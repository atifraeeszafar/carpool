<?php

namespace App\Base\Payment;

use App\Base\Payment\PaymentInterface;

/**
 * Class Stripe
 *
 */
class Stripe implements PaymentInterface {

	public static $gateway;


	public function addUserCard($request) {

		dd($request->all());
	}
}