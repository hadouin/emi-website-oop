<?php
require_once '../vendor/autoload.php';

$router = new Router($_GET['url']);
$router->get('/', 'Welcome#render');
$router->run();
