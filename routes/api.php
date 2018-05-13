<?php

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login',    'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');;

    Route::get('user',     'AuthController@user');
    Route::get('refresh',  'AuthController@refresh');
    Route::post('logout',  'AuthController@logout');
});

Route::middleware('auth')->group(function () {
    Route::apiResources([
        'users'     => 'UserController',
        'hospitals' => 'HospitalController',
    ]);

    Route::get('hospitals/{hospital}/employees', 'HospitalController@getEmployees');

    Route::namespace('Management')->group(function () {
        Route::apiResources([
            'roles' => 'RoleController',
        ]);

        Route::prefix('users/{user}')->group(function () {
            Route::get('roles',    'RoleController@getForUser');
            Route::post('roles',   'RoleController@assignToUser');
            Route::put('roles',    'RoleController@syncWithUser');
            Route::delete('roles', 'RoleController@removeFromUser');
        });
    });

    Route::namespace('Location')->group(function () {
        Route::apiResources([
            'countries' => 'CountryController',
            'regions'   => 'RegionController',
            'cities'    => 'CityController',
            'streets'   => 'StreetController',
            'addresses' => 'AddressController',
        ]);

        Route::get('countries/{country}/regions', 'CountryController@getRegions');
        Route::get('countries/{country}/cities',  'CountryController@getCities');
        Route::get('regions/{region}/cities',     'RegionController@getCities');
        Route::get('cities/{city}/streets',       'CityController@getStreets');
        Route::get('streets/{street}/addresses',  'StreetController@getAddresses');
    });
});