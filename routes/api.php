<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout',[AuthenticationController::class, 'logout']);
    Route::get('/me',[AuthenticationController::class, 'me']);
    Route::post('/posts',[PostController::class, 'store']);
    Route::patch('/posts/{id}',[PostController::class, 'update'])->middleware('pemilik-postingan');
});

Route::post('/login',[AuthenticationController::class, 'login']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts2/{id}', [PostController::class, 'show2']);


