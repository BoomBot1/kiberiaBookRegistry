<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api;
use \App\Http\Middleware\ApiMiddleware;



Route::post('/login', [Api\AuthController::class, '__invoke'])->name('login');

Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('books')->group(function (){
        Route::patch('/{id}', [Api\Book\UpdateController::class, '__invoke']);
        Route::delete('/{id}', [Api\Book\DeleteController::class, '__invoke']);
    });

    Route::patch('authors/{id}', [Api\Author\UpdateController::class, '__invoke']);

});

Route::prefix('authors')->group(function ()
{
    Route::get('/', [Api\Author\IndexController::class, '__invoke']);
    Route::get('/{id}',[Api\Author\ShowController::class, '__invoke']);
});
Route::prefix('books')->group(function () {
    Route::get('/', [Api\Book\IndexController::class, '__invoke']);
    Route::get('/{id}', [Api\Book\ShowController::class, '__invoke']);
});

Route::get('genres', [Api\Genre\IndexController::class, '__invoke']);


