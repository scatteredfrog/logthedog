<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/update/{user}/', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/logit/meal', [App\Http\Controllers\LogitController::class, 'log_meal'])->name('logit.meal');
Route::get('/logit/walk', [App\Http\Controllers\LogitController::class, 'log_walk'])->name('logit.walk');
Route::get('/logit/potty', [App\Http\Controllers\LogitController::class, 'log_potty'])->name('logit.potty');
Route::get('/logit/treat', [App\Http\Controllers\LogitController::class, 'log_treat'])->name('logit.treat');
Route::get('/logit/med', [App\Http\Controllers\LogitController::class, 'log_med'])->name('logit.med');
Route::get('/logit/bath', [App\Http\Controllers\LogitController::class, 'log_bath'])->name('logit.bath');
Route::get('/dog/registry', [App\Http\Controllers\DogController::class, 'registry'])->name('dog.registry');
Route::get('/glance', [App\Http\Controllers\HomeController::class, 'glance'])->name('fast.glance');
Route::post('/dog/store', [App\Http\Controllers\DogController::class, 'store'])->name('dog.store');

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
