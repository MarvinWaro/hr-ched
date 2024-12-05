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
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store'); // Route to store user
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

});



