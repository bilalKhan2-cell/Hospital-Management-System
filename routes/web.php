<?php

use App\Http\Controllers\BlockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
})->name('dashboard');

Route::resource('blocks',BlockController::class);
