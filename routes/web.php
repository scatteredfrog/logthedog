<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/privacy', function() {
    return view('privacy');
})->name('privacy');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/', function () {
    return view('index');
});

Route::get('/cactus', function() {
    return view('cactus');
})->name('cactus');
