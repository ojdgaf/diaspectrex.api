<?php

Route::prefix('auth')->group(function () {
    Route::post('login',   'AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('user', 'AuthController@user');
    });
});