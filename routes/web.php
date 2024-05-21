<?php

use App\Http\Controllers\{BlockController, DepartmentController, ItemController, PatientController, VendorController, WardController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resources([
    'block' => BlockController::class,
    'department' => DepartmentController::class,
    'ward' => WardController::class,
    'patient' => PatientController::class,
    'item' => ItemController::class,
]);
