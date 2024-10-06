<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\http\Middleware\ContentSecurityPolicy;
use App\Http\Middleware\CheckVerificationCode;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',       
    

    )
    ->withMiddleware(function (Middleware $middleware) {
      $middleware->alias([
        'admin'=>AdminMiddleware::class

      ]);
      $middleware->alias([
        'CSP'=>ContentSecurityPolicy::class

      ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
