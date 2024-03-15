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

Route::get('/',[UserController::class,'show_user_login_page'])->name('users.login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.check');

Route::middleware(['user.login'])->group(function () {
    
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

    Route::get('/stock-request', [StockRequestController::class, 'index'])->name('stock.requests');
    Route::get('/stock-request/create', [StockRequestController::class, 'create'])->name('stock_requests.create');
    Route::get('/users/manage_assignemnt', [UserController::class, 'show_modal'])->name('users.manage_assignment');
    Route::get('/profile', [UserController::class, 'show_user_profile'])->name('users.profile');;
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/stock',[StockRequestController::class,'index'])->name('stocks.index');
    Route::get('/stock/delete_item',[StockRequestController::class,'delete_item'])->name('stocks.delete_item');
    Route::get('/stock/show',[StockRequestController::class,'show'])->name('stocks.show');
    Route::get('/stock/unapproved',[StockRequestController::class,'show_unapproved'])->name('stocks.show_unapproved');

    Route::post('/users/assign_role', [UserController::class, 'assign_role'])->name('users.assign_user_role');
    Route::post('/stock/add_item',[StockRequestController::class,'add_item'])->name('stocks.add_item');
    Route::post('/stock/submit_request',[StockRequestController::class,'store'])->name('stocks.submit_request');
});
