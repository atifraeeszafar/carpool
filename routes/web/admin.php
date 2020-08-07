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

        Route::get('request', 'AdminViewController@viewRequest');
        Route::get('request/fetch', 'AdminViewController@getAllRequest');
        Route::get('request/details', 'AdminViewController@requestDetails');



        Route::get('dashboard', 'AdminViewController@dashboard')->middleware('permission:access-dashboard');
        
            Route::group(['prefix' => 'admins',  'middleware' => 'permission:admin'], function () {

                Route::get('/', 'AdminController@index')->middleware('permission:admin_view');
                Route::get('/fetch', 'AdminController@getAllAdmin')->middleware('permission:admin_view');

                Route::get('/create', 'AdminController@create')->middleware('permission:admin_create');
                Route::post('store', 'AdminController@store')->middleware('permission:admin_create');

                Route::get('edit/{admin}', 'AdminController@getById')->middleware('permission:admin_modify');
                Route::post('update/{admin}', 'AdminController@update')->middleware('permission:admin_modify');

                Route::get('toggle_status/{user}', 'AdminController@toggleStatus')->middleware('permission:admin_status');

                Route::get('delete/{user}', 'AdminController@delete')->middleware('permission:admin_delete');
                
                Route::get('profile/{user}', 'AdminController@viewProfile')->middleware('permission:admin_profile');
                
                Route::post('profile/update/{user}', 'AdminController@updateProfile')->middleware('permission:admin_profile');
            });


        Route::prefix('types')->group(function(){
            Route::get('/', 'TypesController@index')->middleware('permission:types_view');
            Route::get('/fetch', 'TypesController@fetch')->middleware('permission:types_view');
            Route::get('/create', 'TypesController@create')->middleware('permission:types_create');
            Route::post('/store', 'TypesController@store')->middleware('permission:types_create');
            Route::get('/edit/{id}', 'TypesController@getById')->middleware('permission:types_modify');
            Route::post('/update/{role}', 'TypesController@update')->middleware('permission:types_modify');
            Route::get('/delete/{id}', 'TypesController@delete')->middleware('permission:types_delete');
        });
        
        Route::prefix('tesseract')->group(function(){
            Route::get('/', 'TesseractController@index')->middleware('permission:types_view');
            Route::get('/fetch', 'TesseractController@fetch')->middleware('permission:types_view');
            Route::get('/create', 'TesseractController@create')->middleware('permission:types_create');
            Route::post('/store', 'TesseractController@store')->middleware('permission:types_create');
            Route::get('/edit/{id}', 'TesseractController@getById')->middleware('permission:types_modify');
            Route::post('/update/{role}', 'TesseractController@update')->middleware('permission:types_modify');
            Route::get('/delete/{id}', 'TesseractController@delete')->middleware('permission:types_delete');
		});

        Route::prefix('sos')->group(function(){

            Route::get('/', 'SosController@index')->middleware('permission:sos_view');
            Route::get('/fetch', 'SosController@fetch')->middleware('permission:sos_view');
            Route::get('/create', 'SosController@create')->middleware('permission:sos_create');
            Route::post('/store', 'SosController@store')->middleware('permission:sos_create');
            Route::get('/edit/{id}', 'SosController@getById')->middleware('permission:sos_modify');
            Route::post('/update/{role}', 'SosController@update')->middleware('permission:sos_modify');
            Route::get('/delete/{id}', 'SosController@delete')->middleware('permission:sos_delete');
		});

        Route::prefix('faq')->group(function(){

            Route::get('/', 'FaqController@index')->middleware('permission:faq_view');
            Route::get('/fetch', 'FaqController@fetch')->middleware('permission:faq_view');
            Route::get('/create', 'FaqController@create')->middleware('permission:faq_create');
            Route::post('/store', 'FaqController@store')->middleware('permission:faq_create');
            Route::get('/edit/{id}', 'FaqController@getById')->middleware('permission:faq_modify');
            Route::post('/update/{role}', 'FaqController@update')->middleware('permission:faq_modify');
            Route::get('/delete/{id}', 'FaqController@delete')->middleware('permission:faq_delete');
            Route::get('/status/{id}', 'FaqController@status')->middleware('permission:faq_status');
		});

        Route::prefix('cancellation')->group(function(){

            Route::get('/', 'CancellationController@index')->middleware('permission:cancellation_view');
            Route::get('/fetch', 'CancellationController@fetch')->middleware('permission:cancellation_view');
            Route::get('/create', 'CancellationController@create')->middleware('permission:cancellation_create');
            Route::post('/store', 'CancellationController@store')->middleware('permission:cancellation_create');
            Route::get('/edit/{id}', 'CancellationController@getById')->middleware('permission:cancellation_update');
            Route::post('/update/{role}', 'CancellationController@update')->middleware('permission:cancellation_update');
            Route::get('/delete/{id}', 'CancellationController@delete')->middleware('permission:cancellation_delete');
            Route::get('/status/{id}', 'CancellationController@status')->middleware('permission:cancellation_status');

		});

   

        Route::prefix('complaints')->group(function(){
            Route::get('/', 'ComplaintsController@index')->middleware('permission:complaints_view');
            Route::get('/fetch', 'ComplaintsController@fetch')->middleware('permission:complaints_view');
            Route::get('/delete/{id}', 'ComplaintsController@delete')->middleware('permission:complaints_delete');
            Route::get('/status/{id}', 'ComplaintsController@status')->middleware('permission:complaints_status');

        });

        Route::prefix('notification')->group(function(){
            Route::get('/', 'NotificationController@index')->middleware('permission:notification_view');
            Route::get('/fetch', 'NotificationController@fetch')->middleware('permission:notification_view');
            Route::get('/delete/{id}', 'NotificationController@delete')->middleware('permission:notification_delete');
            Route::get('/create', 'NotificationController@create')->middleware('permission:notification_create');
            Route::post('/store', 'NotificationController@store')->middleware('permission:notification_create');

        });

   
        
        Route::prefix('promocode')->group(function(){
            Route::get('/', 'PromoCodeController@index')->middleware('permission:promocode_view');
            Route::get('/fetch', 'PromoCodeController@fetch')->middleware('permission:promocode_view');
            
            Route::get('/create', 'PromoCodeController@create')->middleware('permission:promocode_create');
            Route::post('/store', 'PromoCodeController@store')->middleware('permission:promocode_create');
            
            Route::get('/edit/{id}', 'PromoCodeController@getById')->middleware('permission:promocode_modify');
            Route::post('/update/{role}', 'PromoCodeController@update')->middleware('permission:promocode_modify');
            
            Route::get('/delete/{id}', 'PromoCodeController@delete')->middleware('permission:promocode_delete');
            Route::get('/status/{id}', 'PromoCodeController@status')->middleware('permission:promocode_status');

        });


        Route::prefix('user')->group(function(){

            Route::get('/', 'UsersController@index')->middleware('permission:user_view');
            Route::get('/fetch', 'UsersController@fetch')->middleware('permission:user_view');
            
            Route::get('/create', 'UsersController@create')->middleware('permission:user_create');
            Route::post('/store', 'UsersController@store')->middleware('permission:user_create');
            
            Route::get('/edit/{id}', 'UsersController@getById')->middleware('permission:user_modify');
            Route::post('/update/{role}', 'UsersController@update')->middleware('permission:user_modify');
            
            Route::get('/delete/{id}', 'UsersController@delete')->middleware('permission:user_delete');
            Route::get('/status/{id}', 'UsersController@status')->middleware('permission:user_status');
        });

    });

    Route::namespace('Master')->group(function () {

        Route::prefix('roles')->group(function () {
        
            Route::get('/', 'RoleController@index')->middleware('permission:roles_view');
            Route::get('create', 'RoleController@create')->middleware('permission:roles_create');
            Route::post('store', 'RoleController@store')->middleware('permission:roles_create');
            Route::get('edit/{id}', 'RoleController@getById')->middleware('permission:roles_modify');
            Route::post('update/{role}', 'RoleController@update')->middleware('permission:roles_modify');
            Route::get('assign/permissions/{id}', 'RoleController@assignPermissionView')->middleware('permission:roles_assign_permission');
            Route::post('assign/permissions/update/{role}', 'RoleController@attachAndDetachPermissions')->middleware('permission:roles_assign_permission');
        
        });

        Route::prefix('carmakes')->group(function () {
            
            Route::get('/', 'CarMakeController@index')->middleware('permission:carmakes_view');
            Route::get('create', 'CarMakeController@create')->middleware('permission:carmakes_create');
            Route::post('store', 'CarMakeController@store')->middleware('permission:carmakes_create');
            Route::get('edit/{car_make}', 'CarMakeController@getById')->middleware('permission:carmakes_modify');
            Route::post('update/{car_make}', 'CarMakeController@update')->middleware('permission:carmakes_modify');
            Route::get('delete/{car_make}', 'CarMakeController@delete')->middleware('permission:carmakes_delete');
        
        });

        Route::prefix('carmodels')->group(function () {

            Route::get('/', 'CarModelController@index')->middleware('permission:carmodels_view');
            Route::get('create', 'CarModelController@create')->middleware('permission:carmodels_create');
            Route::post('store', 'CarModelController@store')->middleware('permission:carmodels_create');
            Route::get('edit/{car_make}', 'CarModelController@getById')->middleware('permission:carmodels_modify');
            Route::post('update/{car_make}', 'CarModelController@update')->middleware('permission:carmodels_modify');
            Route::get('delete/{car_make}', 'CarModelController@delete')->middleware('permission:carmodels_delete');

        });

        Route::prefix('system/settings')->group(function () {

            Route::get('/', 'SettingController@index')->middleware('permission:settings_view');
            Route::post('/', 'SettingController@store')->middleware('permission:settings_view');

        });
    });
});
