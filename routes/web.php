<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashbord');
});

Route::post('/daftar', function () {
    return view('welcome');
});
