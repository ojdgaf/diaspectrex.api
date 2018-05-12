<?php

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login',    'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');;

    Route::get('user',     'AuthController@user');
    Route::get('refresh',  'AuthController@refresh');
    Route::post('logout',   'AuthController@logout');
});

Route::middleware('auth')->group(function () {
    Route::apiResource('users', 'UserController');
});