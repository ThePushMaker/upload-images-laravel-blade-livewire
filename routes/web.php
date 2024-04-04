<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/nosotros', function() {
    return view('nosotros');
});
Route::get('/tienda', function() {
    return view('tienda');
});