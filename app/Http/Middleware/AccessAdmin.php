<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccessAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Gate::allows('is-admin'))
        {
            return $next($request);
        }
        if(Gate::allows('is-nurse'))
        {
            return $next($request);
        }
        if(Gate::allows('is-labUser'))
        {
            return $next($request);
        }
        if(Gate::allows('is-patient'))
        {
            return $next($request);
        }
        return redirect('/index');
    }
}
