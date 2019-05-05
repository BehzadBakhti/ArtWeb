<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
      //  dd(auth()->user()->user_role);
        if(auth()->user()->user_role == 'admin'){
             return $next($request);
            }

       return redirect()->back()->with('error','Only Admin can access this URL');
    }
}
