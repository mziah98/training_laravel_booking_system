<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth; /* nak dapatkan user yg tgh login */

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'admin'){
            return $next($request);
        } else {
            abort(404);  /* kua error ni, takleh access page yg hanya utk admin */
        }
    }
}
