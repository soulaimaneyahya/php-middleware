<?php

namespace App\Middleware;

use App\Core\Http\Request;
use App\Core\Middleware\Middleware;

class CustomMiddleware implements Middleware
{
    public function __invoke(Request $request, callable $next)
    {
        dump('Custom-Middleware');

        // $request->code = 401;

        return $next($request);
    }
}
