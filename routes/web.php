<?php

//Auth::routes();
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/home', 'HomeController@index')->name('home');
//
////Route::group(['middleware' => ['role:support']], function () {
//    Route::resource('doctors', 'Users\DoctorController');
////});
//
//Route::prefix('tests')->group(function () {
//    Route::prefix('uploading')->group(function () {
//        Route::post('manually', 'Diagnosing\TestController@createTestManually');
//        Route::post('from-file', 'Diagnosing\TestController@createTestFromFile');
//    });
//});