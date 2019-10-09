<?php

class AuthMiddleware
{
    public static function auth($fn) {
        if (true){
            call_user_func($fn);
        }

        echo 'login first';
    }
}