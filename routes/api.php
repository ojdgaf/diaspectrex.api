<?php

Route::get('test', function () {

});

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
        'hospitals'         => 'HospitalController',
        'services'          => 'ServiceController',
        'examinations'      => 'ExaminationController',
        'diagnostic-groups' => 'DiagnosticGroupController',
        'patient-cards'     => 'PatientCardController',
        'phones'            => 'PhoneController',
        'patient-types'     => 'PatientTypeController'
    ]);

    Route::post('classifiers/training', 'ClassifierController@train');
    Route::apiResource('classifiers', 'ClassifierController')->only(['index', 'show', 'update']);

    Route::get('hospitals/{hospital}/employees', 'HospitalController@getEmployees');

    Route::namespace('Management')->group(function () {
        Route::apiResources([
            'users' => 'UserController',
            'roles' => 'RoleController',
        ]);

        Route::apiResource('permissions', 'PermissionController')->only(['index']);

        Route::patch('users/{user}/present-status', 'UserController@changePresentStatus');
    });

    Route::namespace('Diagnosing')->group(function () {
        Route::apiResources([
            'tests' => 'TestController',
        ]);

        Route::apiResource('predictions', 'PredictionController')->only('store', 'show');
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

    Route::get('diagnosticGroups/{diagnosticGroup}/tests', 'DiagnosticGroupController@getTests');
});