<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//register routes
$router->add('GET', '/landing', 'LandingController', 'landing');


$router->run();

?>