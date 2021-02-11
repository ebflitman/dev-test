<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group([], function()
{
    Route::get('/', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/create/', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
});
