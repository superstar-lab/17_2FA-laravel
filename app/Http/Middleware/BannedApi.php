<?php

namespace App\Http\Middleware;

use Closure;

class BannedApi
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
        if (auth('api')->check() && auth('api')->user()->banned_until && now()->lessThan(auth('api')->user()->banned_until)) {
            return response()->json(array_merge(['status'=> 400],['message'=>'Your account has been suspended. Please contact administrator.']), 200);
        }

        return $next($request);
    }
}
