<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 11/10/2017
 * Time: 16:01
 */

namespace App\Controllers;


use Psr\Http\Message\ResponseInterface;

class Controller
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function render(ResponseInterface $response, $file, $data = [])
    {
        $this->container->views->render($response, $file, $data);
    }

    public function redirect(ResponseInterface $response, $name){
        return $response->withStatus(302)->withHeader('Location',$this->container->router->pathFor($name));
    }

    public function query($sql){
        return $this->container->db->query($sql);
    }

    public function getLastInsertedId(){
        return $this->container->db->lastInsertId();
    }

    public function json(ResponseInterface $response, $data){
        return $response
            ->withJson($data)
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function getFlash(){
        return $this->container->flash;
    }
}