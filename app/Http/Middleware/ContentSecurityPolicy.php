<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        $response = $next($request);
        $nonce = base64_encode(random_bytes(16)); // Генерация нонсе

        // Установка заголовков безопасности
        $response->headers->set('X-Frame-Options', 'DENY'); // Защита от clickjacking
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' https://code.jquery.com http://www.w3.org/2000/svg 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src https://fonts.gstatic.com;");
                $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload'); // HSTS
        $response->headers->set('Referrer-Policy', 'no-referrer'); // Политика реферера
        $response->headers->set('Permissions-Policy', 'geolocation=(self), microphone=()'); // Политика разрешений
        $response->headers->set('Access-Control-Allow-Origin', 'https://vologdacake.ru/'); // CORS (укажите ваш домен)

        return $response;
    }
}
