<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TesttPostController;
use App\Http\Controllers\UploadController;

Route::get('/testt-create', [TesttPostController::class, 'create']);
Route::post('/testt-store', [TesttPostController::class, 'store']);
Route::get('/testt-index', [TesttPostController::class, 'index']);

Route::post('/upload-image', [UploadController::class, 'upload']);