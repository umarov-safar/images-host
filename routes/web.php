<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::controller(ImageController::class)->group(function () {
    Route::get('/', 'index')->name('images.index');
    Route::get('images/create', 'create')->name('images.create');
    Route::post('images/store', 'store')->name('images.store');
    Route::get('images/download-zip/{image}', 'downloadZip')->name('images.download-zip');
});
