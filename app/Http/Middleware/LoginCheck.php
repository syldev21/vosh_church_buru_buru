<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
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
        if (!session()->has('loggedInUser') && ($request->path() != '/' && $request->path() != '/register')){
            return  redirect('/');
        }

        if (session()->has('loggedInUser') && ($request->path() == '/' || $request->path() == '/register')){
            return back();
        }
        return $next($request)
            ->header('cache-control', 'no-cache, no-store, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 GMT');
    }
}
