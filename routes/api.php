<?php

use Illuminate\Support\Facades\Route;
use Iyngaran\User\Http\Controllers\Api\RegisterController;
use Iyngaran\User\Http\Controllers\Api\LoginController;
use Iyngaran\User\Http\Controllers\Api\Secure\UserController;
use Iyngaran\User\Http\Controllers\Api\AdministratorLoginController;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/administrator/login', AdministratorLoginController::class);

Route::resource('/user', UserController::class)->only([
    'index',
]);

Route::group(
    ['prefix' => 'secure', 'as' => 'secure.'],
    function () {
        Route::resource('/user', UserController::class)->except([
            'create',
            'edit'
        ])->middleware(['auth:sanctum']);
    });


