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
              if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'author'){
                return $next($request);
               }
   
          return redirect()->back()->with('error','Only Authors can access this URL');
    }
}
