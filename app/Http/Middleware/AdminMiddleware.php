<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        // kiem tra xem co dung admin hay khong
        // neu khong phai thi tra ve form list
        if(Auth::user()->role !=='admin') {
            return redirect('/list')->with('error', 'Ban khong co quyen truy cap');
        }
        return $next($request);
    }
}