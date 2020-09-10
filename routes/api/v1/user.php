<?php

/*
|--------------------------------------------------------------------------
| User API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */
use App\Base\Constants\Auth\Role;

/*
 * These routes are prefixed with 'api/v1/user'.
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\User'.
 * These routes use the middleware group 'auth'.
 */

//->middleware('auth')
Route::prefix('user')->namespace('User')->group(function () {
    // Get the logged in user.
    Route::get('/', 'AccountController@me');
    /**
     * These routes use the middleware group 'role'.
     * These routes are accessible only by a user with the 'user' role.
     */
    Route::middleware(role_middleware(Role::USER))->group(function () {
        // Update user password.
        Route::post('password', 'ProfileController@updatePassword');
        // Update user profile.
        Route::post('profile', 'ProfileController@updateProfile');
        // Add & Car
        Route::get('list/car', 'CarController@index');
        Route::post('add/car', 'CarController@store');
        Route::post('update/car/{car}', 'CarController@update');
        Route::post('delete/car/{car}', 'CarController@delete');
        Route::prefix('ride')->group(function () {
            Route::post('eta', 'OfferRideController@offerEta');
            Route::post('offer', 'OfferRideController@offerRide');
            Route::post('find', 'FindRideController@findRide');
            Route::post('request', 'RequestForRideController@createRequest');
            // List my created rides
            Route::get('offered-rides', 'OfferedRideListController@index');
            Route::get('taged-rides', 'OfferedRideListController@tagedRides');
            // Accept/Reject request
            Route::post('response-for-request', 'ResponseForRequestController@responseRequset');
            Route::post('cancel-by-passenger', 'PassengerCancelRequestController@cancelRequest');
            Route::post('cancel-by-rider', 'RiderCancelRequestController@cancelRequest');
        
            Route::get('initiated/{ride}', 'RideStatusController@initiated');
            Route::get('trip-start/{ride}', 'RideStatusController@tripStart');
            Route::get('trip-end/{ride}', 'RideStatusController@tripEnd');

            Route::post('trip-user-rate-driver/{ride}', 'OfferRideController@userRating');
            Route::post('trip-driver-rate-user/{ride}', 'OfferRideController@driverRating');


        });
    });

    Route::prefix('ride')->group(function () {
        // Route::post('create', 'RideController@createRide');
        // Route::post('history', 'RideController@history');

        // Route::post('search', 'RideController@search');
    });
});

Route::get('test-socket', function () {
    return 'yess its works';
});
