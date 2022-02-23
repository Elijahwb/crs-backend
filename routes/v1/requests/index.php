<?php

use App\Http\Controllers\v1\RequestsController;
use Illuminate\Support\Facades\Route;

Route::prefix('requests')->group(function () {
    Route::post('all', [RequestsController::class, 'index']);

    Route::post('create', [RequestsController::class, 'store']);

    Route::post('view', [RequestsController::class, 'view_request']);

    Route::post('approve', [RequestsController::class, 'approve_request']);

    Route::post('decline', [RequestsController::class, 'decline_request']);

    Route::post('initiate', [RequestsController::class, 'initiate_request']);

    Route::post('complete', [RequestsController::class, 'complete_request']);

    Route::post('close', [RequestsController::class, 'close_request']);

});
