<?php

namespace App\Core\Middleware;

use App\Core\Http\Request;
use App\Core\Middleware\Middleware;

class MiddlewareStack
{
    protected $start;

    public function __construct()
    {
        // closure fct
        $this->start = function(Request $request) {
            // dump('Start Middleware');
            return $request;
        };
    }

    public function add(Middleware $middleware)
    {
        $next = $this->start;

        /**
         * closure fct
         * $middleware is an instance of __invoke middleware
         * $next is a closue fct
         */
        $this->start = function (Request $request) use($middleware, $next) {
            return $middleware($request, $next);
        };

        /**
         * init
         * SignatureMiddleware = ($next = init)
         * CustomMiddleware = ($next = SignatureMiddleware)
         * 
         * @return void
         */
    }

    public function handle(Request $request)
    {
        return call_user_func($this->start, $request);
    }
}
