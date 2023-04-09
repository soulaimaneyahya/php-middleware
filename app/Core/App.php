<?php

namespace App\Core;

use App\Core\Http\Request;
use App\Core\Middleware\Middleware;
use App\Core\Middleware\MiddlewareStack;

class App
{
    public function __construct
    (
        private MiddlewareStack $middlewareStack
    ) {
        //
    }

    public function add(Middleware $middleware)
    {
        $this->middlewareStack->add($middleware);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function run()
    {
        $result = $this->middlewareStack->handle(new Request());
        dump('run app', $result);
    }
}
