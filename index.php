<?php

$container = require __DIR__ . '/configuration/bootstrap.php';

use Core\Router\Request;
use Core\Router\RouteParser;
use Core\Router\Router;

$router = new Router(new Request(), $container, new RouteParser());

$router->get('/', function () {
    return "<h1>Hello world</h1>";
});

$router->get('/news', 'NewsController@getNews');

$router->get('/contacts', 'ContactsController@getContacts');

$router->get('/blogs', 'BlogController@getBlogs');

$router->get('/blogs/{id}', 'BlogController@getBlogById');

$router->get('/displayNews', 'NewsController@displayNews');
