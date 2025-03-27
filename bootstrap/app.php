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
            'admin.guests' => App\Http\Middleware\AdminRedirect::class,
            'admin.auth' =>  App\Http\Middleware\AdminAuthenticate::class,
            'cashier.guests' => App\Http\Middleware\CashierRedirect::class,
            'cashier.auth' =>  App\Http\Middleware\CashierAuthenticate::class,
            'stockkeeper.guests' => App\Http\Middleware\StockkeeperRedirect::class,
            'stockkeeper.auth' =>  App\Http\Middleware\StockkeeperAuthenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
