<?php

use Illuminate\Support\Facades\Route;

Route::post('/user/register', RegisterController::class);
Route::post('/user/login', LoginController::class);
Route::post('/user', [UserController::class, 'index']);


