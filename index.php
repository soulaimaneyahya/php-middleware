<?php

use App\Core\App;
use App\Middleware\CustomMiddleware;
use App\Middleware\IsAdminMiddleware;
use App\Middleware\SignatureMiddleware;
use App\Core\Middleware\MiddlewareStack;

require './vendor/autoload.php';

$app = new App(new MiddlewareStack());

$app->add(new SignatureMiddleware());
$app->add(new CustomMiddleware());
$app->add(new IsAdminMiddleware());

$app->run();
