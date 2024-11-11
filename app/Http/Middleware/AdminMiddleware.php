<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

  
    public function handle(Request $request, Closure $next)
    {
         // Check if the user is authorized as an administrator
         if (!session()->has('admin_authenticated') || !Auth::guard('admin')->check()) {
            return redirect('/login'); //Redirect to login page
        }

        // Checking if the user has entered a confirmation code
        if (!session()->has('verification_code_entered')) {
            return redirect()->route('verification.form'); // Redirect to code entry page
        }

        return $next($request); 
    }
    
}
