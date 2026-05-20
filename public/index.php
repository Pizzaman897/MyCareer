<?php
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Database.php';
use App\Core\Router;

$router = new Router();

//register routes
$router->add('GET', '/landing', 'LandingController', 'landing');

// Sign in page
$router->add('GET', '/sign-in', 'Sign_inController', 'sign_in');
$router->add('POST', '/sign-in', 'Sign_inController', 'authenticate');

// Create Account page
$router->add('GET', '/register', 'RegisterController', 'register');
$router->add('POST', '/register', 'RegisterController', 'store');

// Daftar Minat dan Keterampilan
$router->add('GET', '/personal-information-form', 'InterestController', 'form');
$router->add('POST', '/personal-information-form', 'InterestController', 'store');

//Home page
$router->add('GET', '/home', 'HomeController', 'home');

//Mail page
$router->add('GET', '/mail', 'MailController', 'mail');

//About page
$router->add('GET', '/about-us', 'MailController', 'about_us');

// Favorite page
$router->add('GET', '/favorite', 'FavoriteController', 'index');
$router->add('POST', '/favorite/add', 'FavoriteController', 'add');
$router->add('POST', '/favorite/remove', 'FavoriteController', 'remove');


// Help Center page
$router->add('GET', '/help-center', 'CustomerSupportController', 'help_center');

// FAQ page
$router->add('GET', '/faq', 'CustomerSupportController', 'faq');

// Contact page
$router->add('GET', '/contact', 'CustomerSupportController', 'contact');

// Privacy Policy page
$router->add('GET', '/privacy-policy', 'LegalController', 'privacypolicy');    

// Terms of Service page
$router->add('GET', '/terms-of-service', 'LegalController', 'termsofservice');

// Cookies Policy page
$router->add('GET', '/cookies-policy', 'LegalController', 'cookiespolicy');

$router->run();

?>