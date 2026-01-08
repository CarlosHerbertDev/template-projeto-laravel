<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use \Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
         $exceptions->renderable(function (ValidationException $e, $request) {
            $isApiPath = $request->is('api/*');
            if ($request->expectsJson() || $isApiPath) {
                return response()->json(
                    $e->errors(),
                    422
                );
            }
        });
    })
    ->create();