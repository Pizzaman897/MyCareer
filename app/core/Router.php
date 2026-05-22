<?php
namespace App\Core;
 
use App\Controllers\StudentController;
class Router

{
    private array $routes = [];

    public function add(string $method, string $uri, string $controller, string $function, array $options = [])
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'function' => $function,
            'options' => $options,
        ];
    }
    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        } 
            

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            $pattern = str_replace(
                search: '{id}',
                replace: '([0-9]+)',
                subject: $route['uri']
            );
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches) && $method  === $route['method']) {
                array_shift($matches);

                if (!empty($route['options']['requires_admin'])) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    if (empty($_SESSION['is_admin']) || empty($_SESSION['admin_id'])) {
                        header('Location: /sign-in-admin');
                        exit;
                    }
                }

                require_once '../app/controllers/' . $route['controller'] . '.php';

                $controllerClass = 'App\Controllers\\' . $route['controller'];
                $controller = new $controllerClass();
                $function = $route['function'];

                call_user_func_array([$controller, $function], $matches);
                return;
            }
        }

 
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
    }
}