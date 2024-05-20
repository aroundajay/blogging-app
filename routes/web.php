<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

// common routes
Route::get('/', function () {
    return view('pages.home');
});

// guest routes
Route::middleware('guest')->group(function () {
    // login
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('', fn () => view('pages.auth.login'))->name('view');
        Route::post('', LoginController::class)->name('action');
    });
});

// auth routes
Route::middleware('auth')->group(function () {
    Route::get('logout', LogoutController::class)->name('logout');
});
