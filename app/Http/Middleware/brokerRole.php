<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
class brokerRole
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
        if(Auth::user()->type == "admin")
                 return $next($request);
        else if (Auth::user()->type == "broker")
                 return $next($request);
        else if(Auth::user()->type == "user")   
                return Redirect::to('/');
    }
}
