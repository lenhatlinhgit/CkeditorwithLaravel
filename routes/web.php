<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TesttPostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PostController;

Route::get('/testt-create', [TesttPostController::class, 'create']);
Route::post('/testt-store', [TesttPostController::class, 'store']);
Route::get('/testt-index', [TesttPostController::class, 'index']);

Route::post('/upload-image', [UploadController::class, 'upload']);

Route::get('/post-create', [PostController::class, 'create']);
Route::post('/post-store', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);

Route::post('/preview', function (\Illuminate\Http\Request $request) {
    return view('testt_preview', [
        'content' => $request->content
    ]);
});