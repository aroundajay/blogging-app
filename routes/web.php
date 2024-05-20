<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// common routes
Route::get('', HomeController::class);

// guest routes
Route::middleware('guest')->group(function () {
    // login
    Route::prefix('login')->name('login')->group(function () {
        Route::get('', fn () => view('pages.auth.login'));
        Route::post('', LoginController::class)->name('.action');
    });
});

// auth routes
Route::middleware('auth')->group(function () {
    Route::get('logout', LogoutController::class)->name('logout');

    Route::resource('posts', PostController::class);
});
