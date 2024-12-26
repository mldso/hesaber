<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::resource('expenses', ExpenseController::class);
Route::resource('assets', AssetController::class);