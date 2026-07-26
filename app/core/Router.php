<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute($method, $uri, $action)
    {
        // normalize URI to always start with /
        $uri = '/' . ltrim($uri, '/');
        $this->routes[] = [
            'method' => $method,
            'uri'    => $uri,
            'action' => $action
        ];
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        // Use 'url' query parameter if it exists (from .htaccess)
        if (isset($_GET['url'])) {
            $requestUri = '/' . rtrim($_GET['url'], '/');
        } else {
            // Fallback parsing if .htaccess is missing
            $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            
            // Strip the base folder from request URI if it's hosted in a subfolder
            $scriptName = dirname($_SERVER['SCRIPT_NAME']);
            $baseFolder = str_replace('\\', '/', $scriptName);
            if (strpos($baseFolder, '/public') !== false) {
                $baseFolder = str_replace('/public', '', $baseFolder);
            }
            
            if ($baseFolder !== '/' && strpos($requestUri, $baseFolder) === 0) {
                $requestUri = substr($requestUri, strlen($baseFolder));
            }
        }
        
        // Normalize Request URI
        if ($requestUri == '') {
            $requestUri = '/';
        }

        foreach ($this->routes as $route) {
            // Convert route placeholders like {id} to regex
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_-]+)', $route['uri']);
            $pattern = '@^' . $pattern . '$@D';
            
            if ($route['method'] === $requestMethod && preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches); // Remove the full match
                
                if (is_callable($route['action'])) {
                    call_user_func_array($route['action'], $matches);
                    return;
                }
                
                if (is_string($route['action'])) {
                    list($controller, $method) = explode('@', $route['action']);
                    $controllerClass = "App\\Controllers\\" . $controller;
                    
                    if (class_exists($controllerClass)) {
                        $controllerInstance = new $controllerClass();
                        if (method_exists($controllerInstance, $method)) {
                            call_user_func_array([$controllerInstance, $method], $matches);
                            return;
                        }
                    }
                }
            }
        }

        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}
