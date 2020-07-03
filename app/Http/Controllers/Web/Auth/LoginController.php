<?php

namespace App\Http\Controllers\Web\Auth;

use App\Base\Constants\Auth\Role;
use App\Base\Services\OTP\Handler\OTPHandlerContract;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;
use App\Events\Auth\UserLogin;
use App\Events\Event;

/**
 * @group Web-Authentication
 *
 * APIs for Authentication
 */
class LoginController extends ApiController
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

    /**
     * The model user identifier field used during login.
     * Can be email or username.
     *
     * @var string
     */
    protected $loginIdentifier = 'email';

    /**
     * LoginController constructor.
     *
     * @param \App\Models\User $user
     * @param \App\Base\Services\OTP\Handler\OTPHandlerContract $otpHandler
     */
    public function __construct(User $user, OTPHandlerContract $otpHandler)
    {
        $this->user = $user;
        $this->otpHandler = $otpHandler;
    }

    /**
     * Login the normal user.
     *
     * @param \App\Http\Requests\Auth\UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @response
     * {
     *"success": true,
     *"message": "success"
     *}
     */
    public function loginSpaUser(UserLoginRequest $request)
    {
        return $this->loginUserAccountSPA($request, Role::USER);
    }

    /**
     * Login the Web admin users.
     *
     * @param \App\Http\Requests\Auth\AdminLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @response
     * {
     *"success": true,
     *"message": "success"
     *}
     */
    public function loginWebUsers(AdminLoginRequest $request)
    {
        return $this->loginUserAccountSPA($request, Role::webPanelLoginRoles());
    }

    /**
     * Logout the user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @response
     * {
     *"success": true,
     *"message": "success"
     *}
     */
    public function logoutSPA(Request $request)
    {
        auth('web')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    /**
     * Login the user for SPA and respond accordingly.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param string|array $role
     * @param array $conditions
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loginUserAccountSPA($request, $role, array $conditions = [])
    {
        return $this->loginUserAccount($request, $role, false, $conditions);
    }

    /**
     * Login the user for Mobile App and respond accordingly.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param string|array $role
     * @param array $conditions
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loginUserAccountApp($request, $role, array $conditions = [])
    {
        return $this->loginUserAccount($request, $role, true, $conditions);
    }

    /**
     * Login the user for SPA or Mobile App and respond accordingly.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param string|array $role
     * @param bool $needsToken
     * @param array $conditions
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loginUserAccount($request, $role, $needsToken = true, array $conditions = [])
    {
        // if ($needsToken && !$request->has(['client_id', 'client_secret'])) {
        //     return $this->respondBadRequest('Missing password grant client credentials');
        // }

        if ($request->has(['email', 'password'])) {
            return $this->setLoginIdentifier('email')
                ->loginUserWithPassword($request, $role, $needsToken, $conditions);
        }

        if ($request->has(['mobile', 'password'])) {
            return $this->setLoginIdentifier('mobile')
                ->loginUserWithPassword($request, $role, $needsToken, $conditions);
        }

        if ($request->has(['username', 'password']) && $this->roleAllowedUsernameLogin($role)) {
            return $this->setLoginIdentifier('username')
                ->loginUserWithPassword($request, $role, $needsToken, $conditions);
        }

        if ($needsToken && $request->has(['mobile', 'otp']) && $this->roleAllowedOTPLogin($role)) {
            return $this->loginUserWithOTP($request, $role, $needsToken, $conditions);
        }

        return $this->respondBadRequest('Missing login credentials');
    }

    /**
     * Login the user using their email and password.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param string|array $role
     * @param bool $needsToken
     * @param array $conditions
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loginUserWithPassword($request, $role, $needsToken = true, array $conditions = [])
    {
        $user = null;

        $identifier = $this->getLoginIdentifier();

        $emailOrUsername = $request->input($identifier);

        $password = $request->input('password');

        if (method_exists($this, $method = 'resolveUserFrom' . Str::studly($identifier))) {
            $user = $this->{$method}($emailOrUsername, $role);
        }

        if (!$user || !hash_check($password, $user->password)) {
            $this->throwInvalidCredentialsException($identifier);
        }

        if (!$user->isActive() || !$this->validateChecks($user, $conditions, $identifier)) {
            $this->throwAccountDisabledException($identifier);
        }

        return $this->authenticateAndRespond($user, $request, $needsToken);
    }

    /**
     * Login the user using their mobile and otp.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param string|array $role
     * @param bool $needsToken
     * @param array $conditions
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loginUserWithOTP($request, $role, $needsToken = true, array $conditions = [])
    {
        $mobile = $request->input('mobile');
        $otp = $request->input('otp');

        $user = $this->resolveUserFromMobile($mobile, $role);

        if (!$user) {
            $this->throwCustomValidationException("User with that mobile number doesn't exist.", 'otp');
        }

        if (!$this->otpHandler->setMobile($mobile)->validate($otp)) {
            $this->throwCustomValidationException('The otp provided is invalid.', 'otp');
        }

        if (!$user->isActive() || !$this->validateChecks($user, $conditions, 'otp')) {
            $this->throwAccountDisabledException('otp');
        }

        $this->otpHandler->delete();

        return $this->authenticateAndRespond($user, $request, $needsToken);
    }

    /**
     * Resolve the user from their email for a particular role.
     *
     * @param string $email
     * @param string|array $role
     * @return \App\Models\User|null
     */
    protected function resolveUserFromEmail($email, $role)
    {
        return $this->user->belongsToRole($role)
            ->where('email', $email)
            ->first();
    }

    /**
     * Resolve the user from their username for a particular role.
     *
     * @param $username $email
     * @param string|array $role
     * @return \App\Models\User|null
     */
    protected function resolveUserFromUsername($username, $role)
    {
        return $this->user->belongsToRole($role)
            ->where('username', $username)
            ->first();
    }

    /**
     * Resolve the user from their mobile for a particular role.
     *
     * @param string $mobile
     * @param string|array $role
     * @return \App\Models\User|null
     */
    protected function resolveUserFromMobile($mobile, $role)
    {
        return $this->user->belongsToRole($role)
            ->where('mobile', $mobile)
            ->first();
    }

    /**
     * Validate the user model conditions.
     *
     * @param $user
     * @param array $conditions
     * @param string $field
     * @return bool
     * @internal param $ \App\Models\User|null
     */
    protected function validateChecks($user, array $conditions, $field)
    {
        foreach ($conditions as $key => $value) {
            if ($user->$key != $value) {
                if (mb_strtolower($key) === 'email_confirmed') {
                    /*
                                             * This validation message will be used in the frontend to display
                                             * the 'Resend confirmation email' button/link. Do not alter it!
                    */
                    $this->throwCustomValidationException('Account email confirmation pending.', $field);
                }

                return false;
            }
        }

        return true;
    }

    /**
     * Authenticate the user and respond accordingly.
     * SPA login will authenticate the user using sessions which will create the cookie on refresh.
     * First party apps (Mobile App) will get the access token and refresh token.
     *
     * @param \App\Models\User $user
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param bool $needsToken
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    protected function authenticateAndRespond(User $user, $request, $needsToken = false)
    {
        event(new UserLogin($user));
        if ($needsToken) {
            if ($request->has('password')) {
                return $this->issueToken([
                'grant_type' => 'password',
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'username' => $request->input($this->getLoginIdentifier()),
                'password' => $request->input('password'),
            ]);
            } else {
                return $this->issueToken([
                'grant_type' => 'personal_access',
                'client_id' => env('PERSONAL_CLIENT_ID'),
                'client_secret' => env('PERSONAL_CLIENT_SECRET'),
                'user_id' => $user->id,
                'scope' => [],
            ]);
            }
        }


        return $this->authenticateUser($user, $request->has('remember'));
    }

    /**
     * Generate and issue the Password Grant Token for the user.
     *
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    protected function issueToken(array $data)
    {
        return app(AccessTokenController::class)
            ->issueToken(app(ServerRequestInterface::class)->withParsedBody($data));
    }

    /**
     * Login user using standard auth method and respond success.
     *
     * @param \App\Models\User $user
     * @param bool $remember
     * @return \Illuminate\Http\JsonResponse
     */
    protected function authenticateUser(User $user, $remember = false)
    {
        auth('web')->login($user, $remember);
        // return view('admin.index');
        return $this->respondSuccess();
    }

    /**
     * Login user using standard auth method and respond success.
     *
     * @param \App\Models\User $user
     * @param bool $remember
     * @return \Illuminate\Http\JsonResponse
     */
    protected function set(User $user, $remember = false)
    {
        auth('web')->login($user, $remember);

        return $this->respondSuccess();
    }

    /**
     * Get the default login identifier.
     *
     * @return string
     */
    protected function getLoginIdentifier()
    {
        return $this->loginIdentifier;
    }

    /**
     * Set the default login identifier.
     * Can be email or username.
     *
     * @param string $loginIdentifier
     * @return $this
     */
    protected function setLoginIdentifier($loginIdentifier)
    {
        $this->loginIdentifier = $loginIdentifier;

        return $this;
    }
}
