<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if (Auth::check() && Auth::user()->role == 1) {
        return $next($request);
    }else if (Auth::check() && Auth::user()->role == 0){
        return redirect('/accessdenied');
    } 
        
    }
}
