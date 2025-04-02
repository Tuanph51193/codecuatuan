<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Lấy thông tin người dùng
            $user = Auth::user();
            
            // Kiểm tra vai trò của người dùng
            if ($user->role == 'admin') {
                return redirect('/categories')->with('success',' Đăng nhập thành công');  // Hoặc trang admin dashboard
            }else{
                return redirect('/list')->with('success',' Đăng nhập thành công');  // Hoặc trang người dùng
            }
            

        }

       
    }
}
