<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require __DIR__ . '/auth/index.php';
    require __DIR__ . '/users/index.php';
    require __DIR__ . '/projects/index.php';
    require __DIR__ . '/modules/index.php';
    require __DIR__ . '/requests/index.php';

});
