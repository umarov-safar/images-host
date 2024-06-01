<?php

use App\Http\Controllers\ApiV1\ImageController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/images')
    ->controller(ImageController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{image}', 'show');
    });

