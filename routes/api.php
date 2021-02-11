<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::resource('/user', UserController::class)->except([
    'create', 'edit'
]);


