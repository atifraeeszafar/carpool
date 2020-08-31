<?php

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */

/**
 * These routes are prefixed with 'api/v1/masters'.
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\Master'.
 * These routes use the middleware group 'auth'.
 */

Route::namespace('Common')->group(function () {

    // Masters Crud
    Route::prefix('common')->group(function () {
        // Get car makes
        Route::get('car/makes', 'CarMakeAndModelController@getCarMakes');
        // Get Car models
        Route::get('car/models/{make_id}', 'CarMakeAndModelController@getCarModels');
        // Car Colors
        Route::get('car/colors', 'CarMakeAndModelController@getCarColors');

        Route::get('list/preferences', 'PreferencesController@index');
    });
});
