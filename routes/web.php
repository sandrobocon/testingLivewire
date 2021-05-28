<?php

use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Profile;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Simpler way to register simple livewire components (don't need to create view)
//Route::get('/register', Register::class)
//    ->middleware('guest')
//    ->name('register');
// If need to specify other layout
//Route::get('/register', Register::class)->layout('layouts.app');

Route::middleware('guest')->group(function(){
    Route::get('/register', Register::class)
        ->name('register');

});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

    Route::get('/profile', Profile::class)
        ->name('profile');
});





// For more complex content (only example not used)
Route::get('/registerComplex', function () {
    return view('registerComplex');
});

require __DIR__.'/auth.php';
