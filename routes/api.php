<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->middleware('web')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('article.index');
    Route::prefix('/article')->group(function () {
        Route::get('/{id}', [ArticleController::class, 'show'])->name('article.show');
    });

    // 'auth:sanctum'
    Route::prefix('/order')->middleware('web')->group(function () {
        Route::prefix('/article')->group(function () {
            Route::get('/update', [OrderController::class, 'update'])->name('order.article.update');
        });
    });
});


