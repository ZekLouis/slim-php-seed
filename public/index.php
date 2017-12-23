<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require "../vendor/autoload.php";

session_start();

$app = new App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

require "../app/config/container.php";

require "../app/config/router.php";

$app->run();