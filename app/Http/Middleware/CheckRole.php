<?php

namespace LaravelForum\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
       
            $role = Auth::user()->role;
            if(  $role == 'service_provider' || 'admin'){
                return $next($request);
            }
            abort(404);      
    }
}
