<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;

class PatientMiddleware
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
        if($request->user() && $request->user()->userType != 'patient'){
            return new Response(view('unauthorized')->with('role','patient'));
        }
        return $next($request);
    }
}
