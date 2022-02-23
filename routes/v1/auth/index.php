<?php

use App\Http\Controllers\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->group(function(){

    Route::post('login', [AuthController::class,'login'])->middleware('api');

    Route::post('refresh', [AuthController::class,'refresh']);

    Route::post('logout', [AuthController::class,"logout"]);

    Route::post('me', [AuthController::class,"show"]);
});
