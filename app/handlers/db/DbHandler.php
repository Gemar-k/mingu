<?php

class DbHandler
{

    private $db;

    private $query;

    private function __construct()
    {
        try{
            $servername = "localhost";
            $dbname = "the32chan";
            $charset = "utf8mb4";

            $this->db = new PDO("mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset, "root", "");

        }catch (Exception $exception){
            echo 'PDO Error occurred!';
        }
    }

    public function dbQuery($query){
        $this->query = $this->db->prepare($query);

        return $this->query;
    }

    public function dbDisconnect(){
        $this->db = null;
    }

    public static function dbConnect() : DbHandler{
        return new DbHandler();
    }

}