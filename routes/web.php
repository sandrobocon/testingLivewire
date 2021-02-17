<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// For more complex content (only exemple not used)
Route::get('/registerComplex', function () {
    return view('registerComplex');
});
