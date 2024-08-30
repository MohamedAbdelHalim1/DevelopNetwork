<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StatsController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/verify-code', [AuthController::class, 'verifyCode']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tags', TagController::class);
    Route::apiResource('posts', PostController::class);
    
    Route::get('/deleted-posts', [PostController::class, 'deletedPosts']);
    Route::post('/restore-posts/{id}', [PostController::class, 'restore']);
    Route::get('/stats', [StatsController::class, 'index']);

});