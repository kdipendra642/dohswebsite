<?php

namespace App\Http;

use Symfony\Component\HttpKernel\HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class
    ];
}