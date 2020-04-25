<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;

class DoctorMiddleware
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
        if($request->user() && $request->user()->userType != 'doctor'){
            return new Response(view('unauthorized')->with('role','doctor'));
        }
        return $next($request);
    }
}
