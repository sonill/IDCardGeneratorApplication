<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class valideUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo " <p text='text-primary'>valid user<p>";
        if(Auth::check())
        {
          return $next($request);
        }
        
        else
        {
            return redirect()->route('login');
        }
       
    }
}
