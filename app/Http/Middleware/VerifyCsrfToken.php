<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/933224605:AAHSQ7mQZfirfXTsDcRpd9PKHaSJgLp-aZ0',
        '/933224605:AAHSQ7mQZfirfXTsDcRpd9PKHaSJgLp-aZ0*',
    ];
}
