<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProblemController;
use Illuminate\Support\Facades\Route;

Route::resource('/customers', CustomerController::class);
Route::resource('/problems', ProblemController::class);
