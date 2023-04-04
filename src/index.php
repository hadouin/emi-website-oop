<?php

use Emi\Router;
use Emi\RouterException;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router($_GET['url']);

$router->get('/', 'Welcome#show');
$router->get('/welcome', 'Welcome#show');

$router->get('/signup', 'Signup#get');
$router->post('/signup', 'Signup#post');

$router->get('/login', 'Login#get');
$router->post('/login', 'Login#post');

$router->get('/logs', 'Logs#get');

$router->get('/app', 'App#get');

$router->get('/404', 'NotFound#show');

try {
    $router->run();
} catch (RouterException $e) {
    header("location: /404");
}
