<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return phpinfo();

    // return phpversion('redis');
});
