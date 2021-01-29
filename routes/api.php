<?php

use Illuminate\Support\Facades\Route;
use Iyngaran\User\Http\Controllers\Api\UserController;

Route::get('/user-api', [UserController::class, 'index']);

