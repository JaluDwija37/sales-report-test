<?php

use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/data', [SalesController::class, 'getSalesData'])->name('sales.data');
