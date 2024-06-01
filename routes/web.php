<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'index'])->name('images.index');
Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('images/store', [ImageController::class, 'store'])->name('images.store');
Route::get('images/download-zip/{image}', [ImageController::class, 'downloadZip'])->name('images.download-zip');


