<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
