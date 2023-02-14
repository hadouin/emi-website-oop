<?php
require_once '../vendor/autoload.php';

use App\Router;
use App\RouterException;

require_once 'Router.php';
require_once 'Route.php';
require_once 'RouterException.php';

$router = new Router($_GET['url']);
$router->get('/', 'Welcome#show');

$router->get('/signup', 'Signup#get');
$router->post('/signup', 'Signup#post');

$router->get('/login', 'Login#get');
$router->post('/login', 'Login#post');

$router->get('/logs', 'Logs#get');

$router->get('/404', 'NotFound#show');
try {
    $router->run();
} catch (RouterException $e) {
    header("location: /404");
}
