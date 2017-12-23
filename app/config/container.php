<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require 'db.php';

$container = $app->getContainer();

$container['views'] = function($container) {

    $dir = dirname(__DIR__);

    // Cache usage
    $view = new Twig($dir . '/views', [
        //'cache' => $dir . 'tmp/cache'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new TwigExtension($container['router'], $basePath));

    return $view;

};

$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

$container['pdo'] = function(){
    $pdo = new PDO('mysql:dbname='.DBNAME.';host='.DBHOST,DBUSER,DBPASSWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};

$container['db'] = function($container){
    return new \App\Databases\Database($container->pdo);
};