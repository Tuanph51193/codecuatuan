<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductsController::class);
