<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function register(Request $request){
        //xác thực dữ liệu vào
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
            'name'=>'required',
            
            
        ]);
        $credentials['role']='user';
    
    $user= User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>$credentials['role'],
    ]);
    // Đăng nhập người dùng sau khi đăng ký
    Auth::login($user);
    // Chuyển hướng đến trang người dùng hoặc admin
    return redirect('/login')->with('success', 'Đăng ký thành công');
}
}
