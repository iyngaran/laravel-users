<?php

use Illuminate\Support\Facades\Route;
use Iyngaran\User\Http\Controllers\UserController;

Route::get('/user-web', [UserController::class, 'index']);

