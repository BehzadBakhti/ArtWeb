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
      if(auth()->check()){
        if(auth()->user()->user_role == 'admin'){
             return $next($request);
            } elseif (auth()->user()->user_role == 'user') {
              abort(404, 'Page Not Found');
            }
          return redirect()->route('dashboard')->with('error','Only Admin can access this URL');
          }
          return redirect()->route('login');
    }
}
