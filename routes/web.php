<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// trang chủ
// Route::get('/', function () {
//     return view('client.home');
// });
Route::get('/', [ProductsController::class, 'homes'])->name('homes');

// form login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
//from đăng ký
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
// xử lý đăng ký
Route::post('/register', [AuthController::class, 'register']); // Sử dụng cú pháp đúng cho controller và phương thức
// đẩy form login
Route::post('/login', [AuthController::class, 'login']);  // Sử dụng cú pháp đúng cho controller và phương thức
// logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
// sử dụng middleware để xác thực users
Route::middleware('client')->group(function () {
    Route::get('/list', function () {
        return view('client.list');
    });
});

// sử dụng middleware để xác thực admin
Route::middleware('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductsController::class);
});
