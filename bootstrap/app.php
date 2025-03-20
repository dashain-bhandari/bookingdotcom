<?php

use App\Http\Middleware\GateDefineMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
  
        // $middleware->group('api', [
        //     \Illuminate\Routing\Middleware\SubstituteBindings::class,
        //     "auth:sanctum",
        //     GateDefineMiddleware::class
        // ]);
        // this works, we have to apply sanctum in api group then only works
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
