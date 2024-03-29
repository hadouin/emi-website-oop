<?php

use Emi\Router;
use Emi\RouterException;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router($_GET['url']);

$router->get('/', 'Welcome#show');
$router->get('/welcome', 'Welcome#show');
$router->post('/contact', 'Welcome#contact');

$router->get('/signup', 'Signup#get');
$router->post('/signup', 'Signup#post');

$router->get('/login', 'Login#get');
$router->post('/login', 'Login#post');

$router->get('/CGU', 'Login#CGU');
$router->get('/forgotPassword', 'ForgotPassword#get');
$router->post('/forgotPassword', 'ForgotPassword#post');

$router->get('/changePassword', 'ChangePassword#get');
$router->post('/changePassword', 'ChangePassword#post');

$router->get('/logs', 'Logs#get');

$router->get('/app', 'App#get');

$router->get('/app/adminSpace', 'AdminSpace#getAdminSpace');
$router->get('/app/AdminSpace/newCode', 'AdminSpace#addNewUserCode');
$router->get('/app/AdminSpace/supprimerCode', 'AdminSpace#deleteUserFromId');

$router->get('/app/workers', 'Worker#showAll');

$router->get('/app/workers/new', 'Worker#new');
$router->post('/app/workers/new', 'Worker#post');

$router->get('/Forum/forum', 'Forum#get');
$router->get('/Forum/sujet', 'Forum#getSujet');
$router->get('/Forum/sujet/search', 'Forum#searchSujet');
$router->get('/Forum/topic', 'Forum#showTopic');
$router->get('/Forum/createTopic', 'Forum#getCreateTopic');
$router->post('/Forum/createTopic', 'Forum#CreateTopic');
$router->post('/Forum/comment', 'Forum#Comment');
$router->get('/Forum/supprimerSujet', 'Forum#deleteSujet');

$router->get('/api/worker/search', 'Worker#searchAjax');
$router->get('/api/appService', 'Integration#appService');
$router->get('/api/test', 'Integration#test');


$router->get('/404', 'NotFound#show');

try {
    $router->run();
} catch (RouterException $e) {
    header("location: /404");
}
