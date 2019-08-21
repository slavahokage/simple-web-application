<?php
session_start();
ini_set('display_errors', 1);
$container = require __DIR__ . '/configuration/bootstrap.php';

use Core\Router\Request;
use Core\Router\RouteParser;
use Core\Router\Router;

$router = new Router(new Request(), $container, new RouteParser());

$router->get('/', function () {
    return "<h1>Hello world</h1>";
});

$router->get('/news', 'NewsController@getNews');

$router->get('/news/new', 'NewsController@createNew');

$router->post('/news/storeNews', 'NewsController@storeNews');

$router->post('/news/storeNews/{id}', 'NewsController@storeNews');

$router->get('/news/update/{id}', 'NewsController@updateNew');

$router->get('/displayNews', 'NewsController@displayNews');

$router->get('/contacts', 'ContactsController@getContacts');

$router->get('/blogs', 'BlogController@getBlogs');

$router->get('/blogs/{id}', 'BlogController@getBlogById');

$router->get('/displayNews', 'NewsController@displayNews');

$router->get('/helloXss', 'HelloController@helloXss');

$router->get('/posts', 'PostsController@posts');

$router->post('/posts', 'PostsController@posts');

$router->post('/news/delete', 'NewsController@deleteNews');
