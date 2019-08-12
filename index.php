<?php

require_once './vendor/autoload.php';

use Router\Request;
use Router\Router;

$router = new Router(new Request);

$router->get('/', function () {
    return "<h1>Hello world</h1>";
});
