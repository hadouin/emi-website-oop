<?php
require_once '../vendor/autoload.php';

use App\Router;
require_once 'router.php';
require_once 'route.php';

$router = new Router($_GET['url']);
$router->get('/', 'Welcome#render');
$router->get('/login', 'Login#get');
$router->post('/login', 'Login#post');
try {
    $router->run();
} catch (\App\RouterException $e) {
    echo "Router Exception";
}
