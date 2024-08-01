<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    //admin@example.ru
    //admin

    public function handle(Request $request, Closure $next)
    {
        // Проверяем, авторизован ли пользователь и является ли он администратором
        if (!Auth::guard('admin')->check()) {
            return redirect('/login'); // Перенаправление на страницу входа
        }

        return $next($request);
    
    }
    
}
