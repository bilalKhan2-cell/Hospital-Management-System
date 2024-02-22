<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
})->name('dashboard');

Route::resource('blocks',BlockController::class);
Route::resource('departments',DepartmentController::class);
