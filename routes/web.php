<?php

use App\Http\Controllers\ProjectController;

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('users', UsersController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('tasks', TaskController::class);
    });
});
