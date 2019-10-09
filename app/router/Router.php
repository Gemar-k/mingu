<?php

include_once 'app/router/Route.php';

class Router
{
    //Routes array
    public $routes = array();

    //The request to the server
    public $request;

    //The method that is used to connect to the server
    public $method;

    //When object is creates the request and method is set
    public function __construct(string $request, string $method)
    {
        $this->request = $request;
        $this->method = $method;
    }

    //add a get route to the routes array
    public function get(string $url, $fn) : Route {
        $route = new Route('GET', $url, $fn);
        array_push($this->routes, $route);

        return $route;
    }

    //add a post route to the routes array
    public function post(string $url, $fn) : Route {
        $route = new Route('POST',$url, $fn);
        array_push($this->routes, $route);

        return $route;
    }

    //redirect to a different route that is defined in web.php
    public static function redirect(string $to) : void {
        header("location: $to");
    }

    //creates a new controller object and executes the corresponding function that is defined in web.php route string
    public function createControllerInstance($route) : bool {
        if (strpos($route, '@') !== false){
            $controller_fn = explode('@', $route);
            $controller = $controller_fn[0];
            $fn = $controller_fn[1];

            //if the controller exists in app/http/controllers
            if (file_exists('app/http/controllers/' . $controller . '.php')){

                $object = new $controller;

                //if the method exists and can be called
                if (method_exists($object, $fn) && is_callable($controller_fn)){
                    $object->$fn();

                    return true;
                }
            }
        }

        return false;
    }

    //returns route by name if defined
    public function getRouteByName(string $name) {
        foreach ($this->routes as $route){
            if ($route->getName() == $name){
                return $route;
            }
        }

        return null;
    }

    //returns route by url and method
    public function getRouteByUrlAndMethod(string $method, string $url) {
        foreach ($this->routes as $route){
            if ($route->getUrl() == $url && $route->getMethod() == $method){
                return $route;
            }
        }

        return null;
    }

    //returns array with routes with the same method
    public function getRoutesByMethod(string $method) : array {
        $selected_routes = array();
        foreach ($this->routes as $route){
            if ($route->getMethod() == $method){
                array_push($selected_routes, $route);
            }
        }

        return $selected_routes;
    }

    //returns array with routes with the same url example: /posts -> GET, /posts -> POST
    public function getRoutesByUrl(string $url) : array {
        $selected_routes = array();
        foreach ($this->routes as $route){
            if ($route->getUrl() == $url){
                array_push($selected_routes, $route);
            }
        }

        return $selected_routes;
    }

    //router wil be executed and wil search for the route with specified controller and function
    public function run() : void{
        $route = $this->getRouteByUrlAndMethod($this->method, $this->request);

        if ($route){
            if (is_callable($route->getFn())){
                $route->getFn()->call($this);
            }else if(is_string($route->getFn())){
                $this->createControllerInstance($route->getFn());
            }
        }else{
            echo '403 page not found';
        }
    }
}