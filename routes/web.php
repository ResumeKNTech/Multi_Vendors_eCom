<?php

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;



// ? Route đăng nhập client
Route::prefix('client')->name('client.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

});
Route::get('/{slug}', [HomeController::class,'index'])->name('home');

Route::middleware(['check_login_customer'])->group(
    function () {
        Route::prefix('/')->name('client.')->group(function () {
        });
    }
);
