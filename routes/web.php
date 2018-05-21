<?php

Route::get('{path}', function () {
    return view('home');
})->where('path', '(.*)');