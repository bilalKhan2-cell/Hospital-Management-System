<?php

use App\Http\Controllers\{BlockController, DepartmentController, PatientController, VendorController, WardController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::resources([
    'block' => BlockController::class,
    'department' => DepartmentController::class,
    'ward' => WardController::class,
    'patient' => PatientController::class,
    'vendor' => VendorController::class
]);
