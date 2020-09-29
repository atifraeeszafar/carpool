<?php

namespace App\Http\Controllers\Api\V1\Auth\Registration;

use DB;
use Twilio;
use App\Models\User;
use App\Models\Country;
use App\Events\Auth\UserLogin;
use App\Base\Constants\Auth\Role;
use App\Events\Auth\UserRegistered;
use Illuminate\Support\Facades\Log;
use App\Base\Libraries\SMS\SMSContract;
use App\Http\Controllers\ApiController;
use App\Jobs\Notifications\OtpNotification;
use Psr\Http\Message\ServerRequestInterface;
use App\Base\Services\OTP\Handler\OTPHandlerContract;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Requests\Auth\Registration\UserRegistrationRequest;
use App\Http\Requests\Auth\Registration\SendRegistrationOTPRequest;
use App\Http\Requests\Auth\Registration\ValidateRegistrationOTPRequest;
use App\Jobs\Notifications\Auth\Registration\UserRegistrationNotification;

/**
 * @group User-Management
 *
 * APIs for User-Management
 */
class UserRegistrationController extends LoginController
{
    /**
     * The OTP handler instance.
     *
     * @var \App\Base\Services\OTP\Handler\OTPHandlerContract
     */
    protected $otpHandler;

    /**
     * The user model instance.
     *
     * @var \App\Models\User
     */
    protected $user;

    protected $smsContract;

    /**
     * UserRegistrationController constructor.
     *
     * @param \App\Models\User $user
     * @param \App\Base\Services\OTP\Handler\OTPHandlerContract $otpHandler
     */
    public function __construct(User $user, OTPHandlerContract $otpHandler, Country $country, SMSContract $smsContract)
    {
        $this->user = $user;
        $this->otpHandler = $otpHandler;
        $this->country = $country;
        $this->smsContract = $smsContract;
    }

    /**
     * Register the user and send welcome email.
     * @bodyParam first_name string required first name of the user
     * @bodyParam last_name string required last name of the user
     * @bodyParam gender string required gender of the user
     * @bodyParam city string required city of the user
     * @bodyParam uuid string required uuid comes from the validate otp's response
     * @bodyParam email email required email of the user
     * @bodyParam password password required password provided user
     * @bodyParam device_token string required device_token of the user
     * @bodyParam login_by tinyInt required from which device the user registered
     * @param \App\Http\Requests\Auth\Registration\UserRegistrationRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @responseFile responses/auth/register.json
     */
    public function register(UserRegistrationRequest $request)
    {
        
        $mobileUuid = $request->input('uuid');
        DB::beginTransaction();
        try {
            $mobile = $this->otpHandler->getMobileFromUuid($mobileUuid);
            $user = $this->user->create([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),       
            'email' => $request->input('email'),
            'active' => 0,
            // 'password' => bcrypt($request->input('password')),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'city' => $request->input('city'),

            
            'mobile' => $mobile,
            'mobile_confirmed' => true,
            'device_token'=>$request->input('device_token'),
            'login_by'=>$request->input('login_by'),
        ]);

            $this->otpHandler->delete($mobileUuid);

            $user->attachRole(Role::USER);

            // $this->dispatch(new UserRegistrationNotification($user));

            event(new UserRegistered($user));
            
        } catch (\Exception $e) {
            DB::rollBack();

            echo "<pre>";
            print_r($e->getMessage());

            die();

            Log::error($e);
            Log::error('Error while Registering a user account. Input params : ' . json_encode($request->all()));
            return $this->respondBadRequest('Unknown error occurred. Please try again later or contact us if it continues.');
        }
        DB::commit();
        return $this->authenticateAndRespond($user, $request, $needsToken=true);

        // return $this->respondSuccess();
    }


    /**
     * Send the mobile number verification OTP during registration.
     * @bodyParam country string required Country of the user
     * @bodyParam mobile int required mMbile of the user
     * @param \App\Http\Requests\Auth\Registration\SendRegistrationOTPRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @response {
     * "success":true,
     * "message":"success",
     * "data":{
     * "uuid":"6ffa38d1-d2ca-434a-8695-701ca22168b1"
     * }
     * }
     */
    public function sendOTP(SendRegistrationOTPRequest $request)
    {
        $field = 'mobile';

        $mobile = $request->input($field);

        DB::beginTransaction();
        try {
            $country_code = $this->country->where('dial_code', $request->input('country'))->exists();
            if (!$country_code) {
                $this->throwCustomValidationException('unable to find country', 'dial_code');
            }
            $mobileForOtp = $request->input('country') . $mobile;

            if (!$this->otpHandler->setMobile($mobile)->create()) {
                $this->throwSendOTPErrorException($field);
            }

            $otp = $this->otpHandler->getOtp();
            // Generate sms from template
            $sms = sms_template('generic-otp', ['otp'=>$otp,'mobile'=>$mobileForOtp], 'en');
            // Send sms by providers
            $this->smsContract->queueOn('priority', $mobile, $sms);
            // $this->dispatch(new OtpNotification($mobile, $otp, $sms));

            /**
             * Send OTP here
             * Temporary logger
             */
            // Twilio::message($mobileForOtp, $message);

            \Log::info($sms);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error while Registering a user account. Input params : ' . json_encode($request->all()));
            return $this->respondBadRequest('Unknown error occurred. Please try again later or contact us if it continues.');
        }
        DB::commit();

        return $this->respondSuccess(['uuid' => $this->otpHandler->getUuid()],'otp_send_successfully');
    }

    /**
     * Validate the mobile number verification OTP during registration.
     * @bodyParam otp string required Provided otp
     * @bodyParam uui string required uuid comes from sen otp api response
     *
     * @param \App\Http\Requests\Auth\Registration\ValidateRegistrationOTPRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @response {"success":true,"message":"success"}
     */
    public function validateOTP(ValidateRegistrationOTPRequest $request)
    {
        $otpField = 'otp';
        $uuidField = 'uuid';

        $otp = $request->input($otpField);
        $uuid = $request->input($uuidField);

        if (!$this->otpHandler->validate($otp, $uuid)) {
            $message = $this->otpHandler->isExpired() ?
            'The otp provided has expired.' :
            'The otp provided is invalid.';

            $this->throwCustomValidationException($message, $otpField);
        }

        return $this->respondSuccess();
    }
}
