<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function() {
    Route::post('register', [ AuthController::class, 'register' ]);
    Route::post('login', [ AuthController::class, 'login' ]);

    Route::middleware([ AuthMiddleware::class ])->group(function() {
        Route::post('current', [ AuthController::class, 'current' ]);
        Route::post('logout', [ AuthController::class, 'logout' ]);
    });
});

Route::middleware([ AuthMiddleware::class ])->group(function() {
    Route::apiResource('chat', ChatController::class);
    Route::apiResource('chat.message', MessageController::class);
});
