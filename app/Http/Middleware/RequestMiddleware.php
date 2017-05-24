<?php

namespace App\Http\Middleware;

use Closure;

class RequestMiddleware
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
/*        if($request->method()=='POST'){

        }else{
             die('errors');
        }*/
        return $next($request);
    }
}
