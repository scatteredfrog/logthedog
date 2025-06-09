<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
<<<<<<< Updated upstream
=======
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/update/{user}/', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
>>>>>>> Stashed changes

Route::get('/privacy', function() {
    return view('privacy');
})->name('privacy');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/contact_us', function() {
    return view('cactus');
})->name('cactus');

Route::get('/register', function() {
    return view('auth/register');
})->name('register');
