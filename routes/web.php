<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
})->name('dashboard');

Route::resource('blocks', BlockController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('wards', WardController::class);
Route::resource('users', UserController::class);
Route::resource('designations',DesignationController::class);

Route::get('/profile', function () {
    return view('admin.profile');
});
