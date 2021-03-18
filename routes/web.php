<?php

use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Simpler way to register simple livewire components (don't need to create view)
Route::get('/register', Register::class)
    ->middleware('guest')
    ->name('register');
// If need to specify other layout
//Route::get('/register', Register::class)->layout('layouts.app');







// For more complex content (only exemple not used)
Route::get('/registerComplex', function () {
    return view('registerComplex');
});

require __DIR__.'/auth.php';
