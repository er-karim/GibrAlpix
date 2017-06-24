<?php

namespace App\Core;

/**
 * Router class file
 *
 * @package App\Core
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class Router
{

    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * load routes file
     * @param  string $file
     * @return Router
     */
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * register app post route
     * @param  string $uri
     * @param  string $controller
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * register app post route
     * @param  string $uri
     * @param  string $controller
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * direct to the right controller method
     * @param  string $uri
     * @param  string $request_type
     * @return mixed
     */
    public function direct($uri, $request_type)
    {
        if (!array_key_exists($uri, $this->routes[$request_type])) {
            throw new Exception("Non-existent route for this URI");
        }

        $parts = explode('@', $this->routes[$request_type][$uri]);
        $this->callMethod($parts[0], $parts[1]);
    }

    /**
     * call method of the controller
     * @param  string $controller_name
     * @param  string $method_name
     * @return mixed
     */
    protected function callMethod($controller_name, $method_name)
    {
        $controller_name = "App\\Controllers\\{$controller_name}";
        $controller = new $controller_name;

        if (method_exists($controller, $method_name)) {
            return $controller->$method_name();
        }

        throw new Exception("Error {$controller_name} doesn't have a method {$method_name}()");

    }
}
