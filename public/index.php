<?php
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//register routes
$router->add('GET', '/landing', 'LandingController', 'landing');

// Sign in page
$router->add('GET', '/signin', 'SigninController', 'signin');
$router->add('POST', '/signin', 'SigninController', 'authenticate');

// Create Account page
$router->add('GET', '/create', 'CreateController', 'create');
$router->add('POST', '/create', 'CreateController', 'store');

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

//Home page
$router->add('GET', '/home', 'HomeController', 'home');

//Rekomendasi karir
$router->add('GET', '/recommendations', 'RecommendationController', 'recommendations');

$router->run();

?>