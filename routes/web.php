<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group([], function()
{
    Route::get('/', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::get('/user/{user}/edit', [UserController::class, 'edit']);
    Route::post('/user/{user}/update', [UserController::class, 'update']);
    Route::get('/user/{user}/delete', [UserController::class, 'destroy']);
    Route::post('/user/create/', [UserController::class, 'store']);
});
