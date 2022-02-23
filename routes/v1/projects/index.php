<?php

use App\Http\Controllers\v1\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::prefix('projects')->group(function () {
    Route::get('all', [ProjectsController::class, 'index']);
});
