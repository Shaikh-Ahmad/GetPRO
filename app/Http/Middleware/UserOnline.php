<?php

namespace LaravelForum\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;

class UserOnline
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
        if(Auth::check()){
            $expire_at = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online'.Auth::user()->id, true, $expire_at);
        }
        return $next($request);
    }
}
