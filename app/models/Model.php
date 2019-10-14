<?php
require_once 'app/handlers/db/DbHandler.php';

class Model
{
    public static function all(){
        $dbhandler = DbHandler::dbConnect();

        return $dbhandler->select("SELECT * FROM ". str_replace('model', '', strtolower(get_called_class())));
    }

    public static function where($colum, $operator, $condition){
        $dbhandler = DbHandler::dbConnect();

        return $dbhandler->select("SELECT * FROM "
            . str_replace('model', '', strtolower(get_called_class())) .
            " WHERE $colum $operator $condition");
    }
}