<?php

use App\Controllers\FirstController;
use App\Library\Middleware;

$mw = new Middleware($container);

// HOME
$app->get('/',
    FirstController::class.':index'
)->setName('index')->add($mw);