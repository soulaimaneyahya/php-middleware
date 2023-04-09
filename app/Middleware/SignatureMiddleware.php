<?php

namespace App\Middleware;

use App\Core\Http\Request;
use App\Core\Middleware\Middleware;

class SignatureMiddleware implements Middleware
{
    public function __invoke(Request $request, callable $next)
    {
        dump('Signature-Middleware');

        return $next($request);
    }
}
