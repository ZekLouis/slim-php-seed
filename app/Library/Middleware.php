<?php

namespace App\Library;

use Slim\Http\Request;
use Slim\Http\Response;

class Middleware{
    private $container;
    public function __construct($container){
        $this->container = $container;
    }
    public function __invoke(Request $request,Response $response, $next){
        $response = $next($request, $response);
        return $response;
    }
}