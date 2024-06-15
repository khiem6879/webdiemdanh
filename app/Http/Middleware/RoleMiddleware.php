<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('DangNhap');
        }
     
        $user = Auth::user();
        $user_role = session('user_role');
        if (!in_array($user_role, $roles)) {
            // dd($user_role);
            return redirect()->route('DangNhap')->with('thong_bao', 'Bạn không có quyền truy cập');
        }
 

        return $next($request);
    }
    
}
