<?php

namespace App\Http\Middleware;

use Closure;

class Author
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
              if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'author'){
                  return $next($request);
               }elseif (auth()->user()->user_role == 'vendor') {
            
                  return redirect()->route('dashboard')->with('error','Only Authors can access this URL');
             }
              abort(404, 'Page Not Found');
          }
          return redirect()->route('login');
    }
}
