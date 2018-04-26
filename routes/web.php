<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => ['role:support']], function () {
    Route::resource('doctors', 'Users\DoctorController');
//});
