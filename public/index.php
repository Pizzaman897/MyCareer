<?php
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Database.php';
use App\Core\Router;

$router = new Router();

//register routes
$router->add('GET', '/landing', 'LandingController', 'landing');

// Admin sign in page
$router->add('GET', '/sign-in-admin', 'Sign_inController', 'admin_sign_in');
$router->add('POST', '/sign-in-admin', 'Sign_inController', 'authenticate_admin');

// Sign in page
$router->add('GET', '/sign-in', 'Sign_inController', 'sign_in');
$router->add('POST', '/sign-in', 'Sign_inController', 'authenticate');

// Create Account page
$router->add('GET', '/register', 'RegisterController', 'register');
$router->add('POST', '/register', 'RegisterController', 'store');

// Daftar Minat dan Keterampilan
$router->add('GET', '/personal-information-form', 'InterestController', 'form');
$router->add('POST', '/personal-information-form', 'InterestController', 'store');

// Edit Interest page
$router->add('GET', '/interests/edit', 'InterestController', 'edit');
$router->add('POST', '/interests/edit', 'InterestController', 'updateInterests');

// Logout
$router->add('GET', '/logout', 'Sign_inController', 'logout');

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

// Admin page
$router->add('GET', '/admin', 'AdminController', 'dashboard', ['requires_admin' => true]);
$router->add('GET', '/admin/users', 'AdminController', 'users', ['requires_admin' => true]);
$router->add('GET', '/admin/career-paths', 'AdminController', 'career_paths', ['requires_admin' => true]);
$router->add('GET', '/admin/career-paths/add', 'AdminController', 'add_career', ['requires_admin' => true]);
$router->add('POST', '/admin/career-paths/add', 'AdminController', 'store_career', ['requires_admin' => true]);
$router->add('GET', '/admin/career-paths/edit/{id}', 'AdminController', 'edit_career', ['requires_admin' => true]);
$router->add('POST', '/admin/career-paths/edit/{id}', 'AdminController', 'update_career', ['requires_admin' => true]);
$router->add('GET', '/admin/interests', 'AdminController', 'interests', ['requires_admin' => true]);
$router->add('GET', '/admin/interests/add', 'AdminController', 'add_interest', ['requires_admin' => true]);
$router->add('POST', '/admin/interests/add', 'AdminController', 'store_interest', ['requires_admin' => true]);
$router->add('GET', '/admin/interests/edit/{id}', 'AdminController', 'edit_interest', ['requires_admin' => true]);
$router->add('POST', '/admin/interests/edit/{id}', 'AdminController', 'update_interest', ['requires_admin' => true]);
$router->add('GET', '/admin/logout', 'AdminController', 'logout', ['requires_admin' => true]);
// Assign / Manage page for admin (add/edit/assign)
$router->add('GET', '/admin/assign', 'AdminController', 'assign', ['requires_admin' => true]);
$router->add('POST', '/admin/assign', 'AdminController', 'assign', ['requires_admin' => true]);
$router->add('GET', '/admin/manage', 'AdminController', 'assign', ['requires_admin' => true]);
$router->add('POST', '/admin/manage', 'AdminController', 'assign', ['requires_admin' => true]);

// DELETE routes for interests and career paths
$router->add('DELETE', '/admin/interests/{id}', 'AdminController', 'delete_interest', ['requires_admin' => true]);
$router->add('DELETE', '/admin/career-paths/{id}', 'AdminController', 'delete_career', ['requires_admin' => true]);

$router->run();

?>