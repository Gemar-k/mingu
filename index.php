<?php

//autoload classes when called like $class = new Class()
//moet nog een if statement met containes om the checken wat voor class het is. Model of router bijvoorbeeld
spl_autoload_register(function ($class) {
    if (preg_match('/Controller/', $class)){
        require_once 'app/http/controllers/' . $class . '.php';
    }else if (preg_match('/Model/', $class)){
        require_once 'app/models/' . $class . '.php';
    }
});

//include router manually
require_once 'app/router/Router.php';
//start off the routing
require_once 'routes/web.php';