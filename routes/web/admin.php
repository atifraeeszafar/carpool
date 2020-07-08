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

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('types', 'TypesController@index');
            Route::get('types/fetch', 'TypesController@fetch');
            Route::get('types/create', 'TypesController@create');
            Route::post('types/store', 'TypesController@store');
            Route::get('types/edit/{id}', 'TypesController@getById');
            Route::post('types/update/{role}', 'TypesController@update');
            Route::get('types/delete/{id}', 'TypesController@delete');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('sos', 'SosController@index');
            Route::get('sos/fetch', 'SosController@fetch');
            Route::get('sos/create', 'SosController@create');
            Route::post('sos/store', 'SosController@store');
            Route::get('sos/edit/{id}', 'SosController@getById');
            Route::post('sos/update/{role}', 'SosController@update');
            Route::get('sos/delete/{id}', 'SosController@delete');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('faq', 'FaqController@index');
            Route::get('faq/fetch', 'FaqController@fetch');
            Route::get('faq/create', 'FaqController@create');
            Route::post('faq/store', 'FaqController@store');
            Route::get('faq/edit/{id}', 'FaqController@getById');
            Route::post('faq/update/{role}', 'FaqController@update');
            Route::get('faq/delete/{id}', 'FaqController@delete');
            Route::get('faq/edit/{id}', 'FaqController@getById');
            Route::get('faq/status/{id}', 'FaqController@status');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('cancellation', 'CancellationController@index');
            Route::get('cancellation/fetch', 'CancellationController@fetch');
            Route::get('cancellation/create', 'CancellationController@create');
            Route::post('cancellation/store', 'CancellationController@store');
            Route::get('cancellation/edit/{id}', 'CancellationController@getById');
            Route::post('cancellation/update/{role}', 'CancellationController@update');
            Route::get('cancellation/delete/{id}', 'CancellationController@delete');
            Route::get('cancellation/edit/{id}', 'CancellationController@getById');
            Route::get('cancellation/status/{id}', 'CancellationController@status');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('complaints', 'ComplaintsController@index');
            Route::get('complaints/fetch', 'ComplaintsController@fetch');
            Route::get('complaints/delete/{id}', 'ComplaintsController@delete');
            Route::get('complaints/status/{id}', 'ComplaintsController@status');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('notification', 'NotificationController@index');
            Route::get('notification/fetch', 'NotificationController@fetch');
            Route::get('notification/delete/{id}', 'NotificationController@delete');
            Route::get('notification/create', 'NotificationController@create');
            Route::post('notification/store', 'NotificationController@store');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('promocode', 'NotificationController@index');
            Route::get('promocode/fetch', 'NotificationController@fetch');
            Route::get('promocode/delete/{id}', 'NotificationController@delete');
            Route::get('promocode/create', 'NotificationController@create');
            Route::post('promocode/store', 'NotificationController@store');

        });

        Route::group(['middleware' => 'permission:admin'], function () {
            Route::get('promocode', 'PromoCodeController@index');
            Route::get('promocode/fetch', 'PromoCodeController@fetch');
            Route::get('promocode/create', 'PromoCodeController@create');
            Route::post('promocode/store', 'PromoCodeController@store');
            Route::get('promocode/edit/{id}', 'PromoCodeController@getById');
            Route::post('promocode/update/{role}', 'PromoCodeController@update');
            Route::get('promocode/delete/{id}', 'PromoCodeController@delete');
            Route::get('promocode/edit/{id}', 'PromoCodeController@getById');
            Route::get('promocode/status/{id}', 'PromoCodeController@status');

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
