<?php

use Illuminate\Support\Facades\Route;
use Iyngaran\User\Http\Controllers\Api\RegisterController;
use Iyngaran\User\Http\Controllers\Api\LoginController;
use Iyngaran\User\Http\Controllers\Api\UserController;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::resource('/user', UserController::class)->except([
    'create', 'edit'
])->middleware(['auth:sanctum']);


