<?php

//new router object with the request method and url
$router = new Router(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), $_SERVER['REQUEST_METHOD']);

//show home page
$router->get('/mingu/', function (){
    require 'resources/views/home.php';
});


$router->get('/mingu/login', 'AuthController@login')->name('login');

//runs the router with the above defined routes
$router->run();