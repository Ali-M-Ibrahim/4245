<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'checkingkey' => \App\Http\Middleware\checkkey::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'route-14',
            'route-15',
            'addReaderFromApi',
            'addReaderMethod2FromPostman',
            'addReader3',
            'addCustomer3',
            'updateCustomer2/*',
            'updateCustomer3',
            'deleteCustomer/*',
            'updateCustomer4/*',
            'post/*',
            'post'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
