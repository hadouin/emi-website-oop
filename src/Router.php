<?php

namespace Emi;

class Router
{
    private string $url; // Contiendra l'URL sur laquelle on souhaite se rendre
    private array $routes = []; // Contiendra la liste des routes

    private array $namedRoutes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get(string $path, callable|string $callable, string $name = null): Route
    {
        return $this->add($path, $callable, $name, "GET");
    }
    public function post(string $path, callable|string $callable, string $name = null): Route
    {
        return $this->add($path, $callable, $name, "POST");
    }

    private function add(string $path, callable|string $callable, string|null $name, string $method): Route
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if (is_string($callable) && $name === null){
            $name = $callable;
        }
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }

        return $route; // On retourne la route pour "enchainer" les méthodes
    }

    /**
     * @throws RouterException
     */
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }

}