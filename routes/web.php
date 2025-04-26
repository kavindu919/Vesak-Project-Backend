<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AdminController::class, 'index']);

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('get-allusers');
});
Route::group(['prefix' => 'events'], function () {
    Route::get('/', [EventController::class, 'index'])->name('get-allevents');
});
