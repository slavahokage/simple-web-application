<?php

require_once './vendor/autoload.php';

use Core\Router\Request;
use Core\Router\Router;

$router = new Router(new Request);

$router->get('/', function () {
    return "<h1>Hello world</h1>";
});

$router->get('/news', 'NewsController@getNews');

$router->get('/contacts', 'ContactsController@getContacts');
