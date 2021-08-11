<?php

namespace App\Http\Middleware;

use Closure;

class CustomCKFinderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @author 
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->level == 1) {
            config(['ckfinder.authentication' => function () use ($request) {
                return true;
            }]);
        } else {
            config(['ckfinder.authentication' => function () use ($request) {
                return false;
            }]);
        }

        return $next($request);
    }
}
