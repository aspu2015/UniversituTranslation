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
<<<<<<< HEAD
        if ($request->ip() != "172.16.2.207") {
=======
        $ip = file_get_contents('https://api.ipify.org');
        if ($ip != "91.202.254.178") {
>>>>>>> d175602241798654231a7f870153a6d45bb27e09
            // here instead of checking a single ip address we can do collection of ips
            //address in constant file and check with in_array function
                return redirect('/');
            }
        return $next($request);
    }
}
