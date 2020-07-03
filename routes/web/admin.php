<?php

/*
|--------------------------------------------------------------------------
| SPA Auth Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with '/'.
| These routes use the root namespace 'App\Http\Controllers\Web'.
|
 */
use App\Base\Constants\Auth\Role;

/*
 * These routes are used for web authentication.
 *
 * Route prefix 'api/spa'.
 * Root namespace 'App\Http\Controllers\Web\Admin'.
 */

/**
 * Temporary dummy route for testing SPA.
 */


Route::namespace('Admin')->group(function () {

    // Get admin-login form
    Route::get('login', 'AdminViewController@viewLogin');

    Route::get('login/facebook', 'AdminViewController@redirectToProvider');

    Route::get('login/facebook/callback', 'AdminViewController@handleProviderCallback');
});


Route::middleware('auth:web')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::get('dashboard', 'AdminViewController@dashboard')->middleware('permission:access-dashboard');
        Route::group(['prefix' => 'admins',  'middleware' => 'permission:admin'], function () {
            // prefix('admins')->group(function () {
            Route::get('/', 'AdminController@index');
            Route::get('/fetch', 'AdminController@getAllAdmin');
            Route::get('/create', 'AdminController@create');
            Route::post('store', 'AdminController@store');
            Route::get('edit/{admin}', 'AdminController@getById');
            Route::post('update/{admin}', 'AdminController@update');
            Route::get('toggle_status/{user}', 'AdminController@toggleStatus');
            Route::get('delete/{user}', 'AdminController@delete');
            Route::get('profile/{user}', 'AdminController@viewProfile');
            Route::post('profile/update/{user}', 'AdminController@updateProfile');
        });
    });

    Route::namespace('Master')->group(function () {
        Route::prefix('roles')->group(function () {
            Route::get('/', 'RoleController@index');
            Route::get('create', 'RoleController@create');
            Route::post('store', 'RoleController@store');
            Route::get('edit/{id}', 'RoleController@getById');
            Route::post('update/{role}', 'RoleController@update');
            Route::get('assign/permissions/{id}', 'RoleController@assignPermissionView');
            Route::post('assign/permissions/update/{role}', 'RoleController@attachAndDetachPermissions');
        });
        Route::prefix('carmakes')->group(function () {
            Route::get('/', 'CarMakeController@index');
            Route::get('create', 'CarMakeController@create');
            Route::post('store', 'CarMakeController@store');
            Route::get('edit/{car_make}', 'CarMakeController@getById');
            Route::post('update/{car_make}', 'CarMakeController@update');
            Route::get('delete/{car_make}', 'CarMakeController@delete');
        });
        Route::prefix('carmodels')->group(function () {
            Route::get('/', 'CarModelController@index');
            Route::get('create', 'CarModelController@create');
            Route::post('store', 'CarModelController@store');
            Route::get('edit/{car_make}', 'CarModelController@getById');
            Route::post('update/{car_make}', 'CarModelController@update');
            Route::get('delete/{car_make}', 'CarModelController@delete');
        });
        Route::prefix('system/settings')->group(function () {
            Route::get('/', 'SettingController@index');
            Route::post('/', 'SettingController@store');
        });
    });
});
