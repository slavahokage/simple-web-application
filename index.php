<?php

require_once './vendor/autoload.php';

use Router\Request;
use Router\Router;

ini_set('display_errors', '1');

$router = new Router(new Request);

$router->get('/', function () {
    return "<h1>Hello world</h1>";
});

$router->get('/news', 'NewsController@getNews');

$router->get('/contacts', 'ContactsController@getContacts');

$router->get('/blogs', 'BlogController@getBlogs');