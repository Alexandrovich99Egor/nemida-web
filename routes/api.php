<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apu\v1\UsersController;


Route::group(['prefix' => 'api/v1'], function () {
    Route::get('users', [UsersController::class, 'index']);
});

