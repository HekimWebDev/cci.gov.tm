<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LoginViewController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'auth.',
], static function () {

    Route::group([
        'middleware' => 'guest'
    ], static function (){
        Route::get('/login', LoginViewController::class)->name('login.page');
        Route::post('/login', LoginController::class)->name('login');
    });

    Route::group([
        'middleware' => 'admin'
    ], static function () {
        Route::post('/logout', LogoutController::class)->name('logout');
    });
});
