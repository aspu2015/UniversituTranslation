<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
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
        $ip = file_get_contents('https://api.ipify.org');
        if ($ip == "91.202.254.184" || $ip == "91.202.254.178") {
            return $next($request);
            }
        return redirect('/');
    }
}
   