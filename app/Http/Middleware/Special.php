<?php

namespace App\Http\Middleware;

use Closure;

class Special
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
        if(auth()->check()){
            if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'author' || auth()->user()->user_role == 'vendor'){
                return $next($request);
            }elseif (auth()->user()->user_role == 'user') {
            
            abort(404, 'Page Not Found');
            }
        }
        
       return redirect()->route('login');
    }
}
