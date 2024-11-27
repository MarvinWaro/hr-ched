<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    // Route::get('/home', [AdminController::class, 'dashboard']);
    Route::get('/home', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');


});



