<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

  
    public function handle(Request $request, Closure $next)
    {
         // Проверяем, авторизован ли пользователь как администратор
         if (!session()->has('admin_authenticated') || !Auth::guard('admin')->check()) {
            return redirect('/login'); // Перенаправление на страницу входа
        }

        // Проверяем, ввел ли пользователь код подтверждения
        if (!session()->has('verification_code_entered')) {
            return redirect()->route('verification.form'); // Перенаправление на страницу ввода кода
        }

        return $next($request); // Продолжаем выполнение запроса
    }
    
}
