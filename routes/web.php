<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;


Route::get('/', function () {
   return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
   // Route::get('/home', [AdminController::class, 'dashboard']);
   Route::get('/home', [AdminController::class, 'index'])->name('dashboard');
   Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
   Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
   Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store'); // Route to store user
   Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
   Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
   Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

   Route::controller(LeaveController::class)->group(function () {
      Route::get('/employee/leave', 'leaveindex')->name('leave');
      Route::get('/employee/leave-apply', 'apply')->name('leave.apply');
      Route::get('/employee/leave-requests', 'requests')->name('leave.requests');
      Route::get('/employee/leave-manage', 'manage')->name('leave.manage');
      Route::get('/employee/leave-policies', 'policies')->name('leave.policies');
      Route::get('/employee/leave-balances', 'balances')->name('leave.balances');
      Route::get('/leave-request/edit/{id}', 'edit')->name('leaveRequest.edit');

   });
});
