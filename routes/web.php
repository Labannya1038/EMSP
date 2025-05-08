<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleComplete'])->name('tasks.toggle');
});



Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth'])->get('/home', [HomeController::class, 'index'])->name('home');

