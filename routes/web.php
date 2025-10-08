<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::view('/register', 'auth.register')
        ->name('register');

    Route::post('/register', [RegisterController::class, 'store']);

    Route::view('/login', 'auth.login')
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->middleware('guest');

    Route::post('/logout', [LogoutController::class, 'logout']);

});

Route::group(['prefix' => 'teacher-dashboard', 'middleware' => ['role-check:Teacher']], function () {

    Route::get('/', [CourseController::class, 'index']);

});

Route::group(['prefix' => 'student-dashboard', 'middleware' => ['role-check:Student']], function () {

    Route::view('/', 'components.dashboard.student-dashboard');

});
