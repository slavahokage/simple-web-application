<?php

ini_set('display_errors', '1');
$container = require __DIR__ . '/configuration/bootstrap.php';

use Core\Router\Request;
use Core\Router\Router;

$router = new Router(new Request, $container);

$router->get('/', function () {
    return "<h1>Hello world</h1>";
});

$router->get('/news', 'NewsController@getNews');

$router->get('/contacts', 'ContactsController@getContacts');

$router->get('/blogs', 'BlogController@getBlogs');
