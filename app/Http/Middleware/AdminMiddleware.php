<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()){
            if (Auth::user()->role_as == 1) // 1=admin 0=common users
            {
                return $next($request);
            }
            else{
            return redirect('/profile')->with('message', 'Access denied as you are not an admin');
            }
        }else{
            return redirect('/')->with('message', 'Please login to continue');
        }

    }
}
