<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (!auth()->check()) {
            return redirect('/'); // or to login page
        }

       if (auth()->user()->userType == 'user') {

          return redirect('/dashboard_user');
        
        }
         if (auth()->user()->userType == 'admin') {

            return $next($request);
           
        
        } 


           

           if (Auth::user() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        return redirect('/');

           

    }
}
