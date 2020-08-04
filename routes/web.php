<?php

use Router\Router;
use App\Exceptions\NotFoundException;

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

try {
    $router->run();
} catch(NotFoundException $e) {
    return $e->notFoundErr();
} 