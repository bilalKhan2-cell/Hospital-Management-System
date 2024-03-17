<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StockRequestController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'show_user_login_page'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.check');

Route::middleware(['user.login'])->group(function () {

    Route::middleware(['user.check_type'])->group(function () {

        Route::get('/dashboard', [UserController::class, 'show_user_dashboard'])->name('dashboard');

        Route::resources([
            'blocks' => BlockController::class,
            'departments' => DepartmentController::class,
            'wards' => WardController::class,
            'users' => UserController::class,
            'designations' => DesignationController::class,
            'patients' => PatientController::class,
            'doctors' => DoctorController::class,
            'medicines' => MedicinesController::class,
            'suppliers' => SupplierController::class,
        ]);

        Route::get('/users/manage_assignemnt', [UserController::class, 'show_modal'])->name('users.manage_assignment');
        Route::get('/profile', [UserController::class, 'show_user_profile'])->name('users.profile');;
        Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

        Route::prefix('stock')->group(function () {
            Route::get('/', [StockRequestController::class, 'index'])->name('stocks.index');
            Route::get('/stock-request', [StockRequestController::class, 'index'])->name('stock.requests');
            Route::get('/stock-request/create', [StockRequestController::class, 'create'])->name('stock_requests.create');
            Route::get('delete_item', [StockRequestController::class, 'delete_item'])->name('stocks.delete_item');
            Route::get('show/{id}', [StockRequestController::class, 'show'])->name('stocks.show');
            Route::get('unapproved', [StockRequestController::class, 'show_unapproved'])->name('stocks.show_unapproved');
            Route::get('/unapproved/process/{id}', [StockRequestController::class, 'process_unapproved'])->name('stocks.process_unapproved');

            Route::post('add_item', [StockRequestController::class, 'add_item'])->name('stocks.add_item');
            Route::post('submit_request', [StockRequestController::class, 'store'])->name('stocks.submit_request');
            Route::post('approve_medicine', [StockRequestController::class, 'approve_medicine'])->name('stocks.approve_medicine');
            Route::post('approve_request', [StockRequestController::class, 'approve_request'])->name('stock.approve_request');
        });

        Route::post('/users/assign_role', [UserController::class, 'assign_role'])->name('users.assign_user_role');
    });

    Route::middleware(['doctor.check-type'])->group(function(){
        Route::prefix('doctor')->group(function () {
            Route::get('/dashboard', [DoctorController::class, 'show_doctor_dashboard'])->name('doctors.dashboard');
            Route::get('/appointments', [DoctorController::class, 'show_pending_appointments'])->name('doctors.show_pending_appointments');
            Route::get('/show_patients', [DoctorController::class, 'show_patients'])->name('doctors.show_patients');
            Route::get('/profile',[DoctorController::class,'show_doctor_profile_page'])->name('doctors.profile');
            Route::get('/logout',[DoctorController::class,'logout'])->name('doctors.logout');
        });
    });
});
