<?php

use App\Core\Router;

require(dirname(__DIR__) . '/vendor/autoload.php');

$router = new Router;
$router->run();
