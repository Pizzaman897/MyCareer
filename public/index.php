<?php
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//register routes
$router->add('GET', '/landing', 'LandingController', 'landing');

// Sign in page
$router->add('GET', '/login', 'LoginController', 'login');
$router->add('POST', '/login', 'LoginController', 'authenticate');

// Create Account page
$router->add('GET', '/register', 'RegisterController', 'register');
$router->add('POST', '/register', 'RegisterController', 'store');

// Daftar Minat dan Keterampilan
$router->add('GET', '/form', 'InterestController', 'form');
$router->add('POST', '/form', 'InterestController', 'store');

//Home page
$router->add('GET', '/home', 'HomeController', 'home');

//Mail page
$router->add('GET', '/mail', 'MailController', 'mail');

//About page
$router->add('GET', '/about-us', 'MailController', 'about_us');

//Favorite page
$router->add('GET', '/favorite', 'MailController', 'favorite');

// Help Center page
$router->add('GET', '/help', 'CustomerSupportController', 'help');

// FAQ page
$router->add('GET', '/faq', 'CustomerSupportController', 'faq');

// Contact page
$router->add('GET', '/contact', 'CustomerSupportController', 'contact');

// Privacy Policy page
$router->add('GET', '/privacy', 'LegalController', 'privacypolicy');    

// Terms of Service page
$router->add('GET', '/terms', 'LegalController', 'termsofservice');

// Cookies Policy page
$router->add('GET', '/cookies', 'LegalController', 'cookiespolicy');

$router->run();

?>