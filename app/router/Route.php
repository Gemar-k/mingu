<?php

/**
 * Class Route
 *
 * This model is used to save routes created in web.php
 */

class Route
{
    //route url
    private $url;

    //the method of the route example: POST, GET
    private $method;

    //fn can hold a function or a string pointing to a controller with function example: Postcontroller@index
    private $fn;

    //optional to give a unique name to a route example: "login", "logout"
    private $name;

    //initial construct of the route with the required parameters
    public function __construct(string $method, string $url, $fn) {
        $this->url = $url;
        $this->method = $method;
        $this->fn = $fn;
    }

    //set the optional route name
    public function name(string $name) : void{
        $this->name = $name;
    }

    //retrieve the optional route name
    public function getName() : string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getFn()
    {
        return $this->fn;
    }



}