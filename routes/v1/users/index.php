<?php

use App\Http\Controllers\v1\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('all', [UsersController::class, 'index']);
});
