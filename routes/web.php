<?php

//new router object with the request method and url
$router = new Router(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), $_SERVER['REQUEST_METHOD']);

//show home page
$router->get('/mingu/', function (){
    require 'resources/views/home.php';
});

//get login page
$router->get('/mingu/login', 'AuthController@login')->name('login');
//get all threads page
$router->get('/mingu/threads', 'ThreadController@index')->name('threads');
//get one thread page
$router->get('/mingu/thread', 'ThreadController@get')->name('thread');
//get all posts page
$router->get('/mingu/posts', 'PostController@index')->name('posts');
//post one post
$router->post('/mingu/post', 'PostController@post')->name('post_save');
//get one post page
$router->get('/mingu/post', 'PostController@get')->name('post');

//runs the router with the above defined routes
$router->run();