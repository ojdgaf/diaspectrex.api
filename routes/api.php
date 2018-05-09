<?php

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login',    'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'ResetPasswordController@reset');

    Route::get('user',     'AuthController@user');
    Route::get('refresh',  'AuthController@refresh');
    Route::post('logout',   'AuthController@logout');
});