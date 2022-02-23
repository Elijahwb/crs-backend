<?php

use App\Http\Controllers\v1\ModulesController;
use Illuminate\Support\Facades\Route;

Route::prefix('modules')->group(function () {
    Route::post('all', [ModulesController::class, 'index']);
});
