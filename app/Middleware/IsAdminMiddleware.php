<?php

namespace App\Middleware;

use App\Core\Http\Request;
use App\Core\Middleware\Middleware;

class IsAdminMiddleware implements Middleware
{
    public function __invoke(Request $request, callable $next)
    {
        dump('is admin middleware');

        $request->code = 403;

        return $next($request);
    }
}
