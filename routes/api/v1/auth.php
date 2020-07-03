<?php

/*
|--------------------------------------------------------------------------
| Auth API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */

/*
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\Auth'.
 */
Route::namespace('Auth')->group(function () {

    // Send the OTP for User login.
    Route::post('user/login/send-otp', 'LoginController@sendUserLoginOTP');

    /**
     * Login Routes
     */
    // Login normal user from first-party clients (Mobile App etc.) using Password Grant.
    Route::post('user/login', 'LoginController@loginUser');

    // Login admin user from first-party clients (Mobile App etc) using Password Grant.
    Route::post('admin/login', 'LoginController@loginAdmin');

    // Logout the user by revoking the access token.
    Route::post('logout', 'LoginController@logout')->middleware('auth');

    /**
     * Root namespace 'App\Http\Controllers\Api\V1\Auth\Registration'.
     */
    Route::namespace('Registration')->group(function () {

        // Register a normal user.
        Route::post('user/register', 'UserRegistrationController@register');

        // Send the OTP for mobile verification during User registration.
        Route::post('user/register/send-otp', 'UserRegistrationController@sendOTP');

        // Validate the registration OTP.
        Route::post('user/register/validate-otp', 'UserRegistrationController@validateOTP');
        // Register Admin user
        Route::post('admin/register', 'AdminRegistrationController@register');
    });

    // Confirm user's email.
    Route::post('email/confirm', 'Email\EmailConfirmationController@confirm');

    // Resend user's email address confirmation email.
    Route::post('email/resend-confirmation', 'Email\EmailConfirmationController@resend');

    /**
     * These routes are prefixed with 'api/v1/password'.
     * Root namespace 'App\Http\Controllers\Api\V1\Auth\Password'.
     */
    Route::prefix('password')->namespace('Password')->group(function () {

        // Send the password reset email.
        Route::post('forgot', 'PasswordResetController@forgotPassword');

        // Validate the password reset token.
        Route::post('validate-token', 'PasswordResetController@validateToken');

        // Reset (update) the user's password.
        Route::post('reset', 'PasswordResetController@reset');
    });
});
