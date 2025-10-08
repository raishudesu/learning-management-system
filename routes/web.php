<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [LogoutController::class, 'logout']);
