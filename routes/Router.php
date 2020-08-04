<?php

namespace Router;

use App\Exceptions\NotFoundException;

class Router
{
    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }
    
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function run() 
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->matches($this->url)) {
                return $route->execute();
            }
        }

        // return header('HTTP/1.0 404 Not Found');
        throw new NotFoundException("페이지를 찾을 수 없습니다.");
    }

}