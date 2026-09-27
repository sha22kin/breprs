<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
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
        
        if(Auth::check() && url('log-out')!==$request->url()){

                // Redirect based on user role
                if(Auth::user()->admin){
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('index');
                }

               //return redirect()->back();
          
        }
        return $next($request);
    }
}
