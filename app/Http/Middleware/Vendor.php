<?php

namespace App\Http\Middleware;

use Closure;

class Vendor
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
           if(auth()->user()->user_role == 'admin' || auth()->user()->user_role == 'vendor'){
                return $next($request);
            } elseif (auth()->user()->user_role == 'author') {
            
                return redirect()->route('dashboard')->with('error','Only Vendors can access this URL');
            }
            abort(404, 'Page Not Found');
        }
        return redirect()->route('login');

        // return redirect()->route('login')->with('error','Only Vendors can access this URL');
    }
}
