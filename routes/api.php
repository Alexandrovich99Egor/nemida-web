<?php

use App\Http\Controllers\Api\v1\UsersController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::get('/users', [UsersController::class, 'index']);

    Route::get('/user/{id}', [UsersController::class, 'getUser']);
});
