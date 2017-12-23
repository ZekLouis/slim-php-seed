<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FirstController extends Controller
{

    public function index(RequestInterface $request, ResponseInterface $response)
    {
        $this->render($response, 'first/index.twig', []);
    }
}