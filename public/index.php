<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//register routes
$router->add('GET', '/landing', 'LandingController', 'landing');

// Daftar Minat dan Keterampilan
$router->add('GET', '/interests', 'InterestController', 'index');

// Daftar Minat dan Keterampilan step 2
$router->add('GET', '/interests2', 'InterestController2', 'index2');

// Daftar Minat dan Keterampilan step 3
$router->add('GET', '/interests3', 'InterestController3', 'index3');

// Daftar Minat dan Keterampilan step 4
$router->add('GET', '/interests4', 'InterestController4', 'index4');

// Daftar Minat dan Keterampilan step 5
$router->add('GET', '/interests5', 'InterestController5', 'index5');

$router->run();

?>