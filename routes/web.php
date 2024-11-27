<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    // Route::get('/home', [AdminController::class, 'dashboard']);
    Route::get('/home', [AdminController::class, 'index'])->name('dashboard');

});



