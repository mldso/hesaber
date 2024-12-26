<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::resource('expenses', ExpenseController::class);
Route::resource('assets', AssetController::class);
Route::resource('types', TypeController::class);