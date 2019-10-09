<?php

class DbHandler
{

    private $db;

    private function __construct()
    {
        try{
            $servername = "localhost";
            $dbname = "mijnwebsite";
            $charset = "utf8mb4";

            $this->db = new PDO("mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset, "root", "");

        }catch (Exception $exception){
            echo 'PDO Error occurred!';
        }
    }

    public function select($query){
        $query_db = $this->db->query($query);
        $result = $query_db->fetchAll();

        $this->dbDisconnect();
        return $result;
    }

    public function prepare($query){
        $query_db = $this->db->prepare($query);
        $result = $query_db->execute();

        $this->dbDisconnect();
        return $result;
    }

    private function dbDisconnect(){
        $this->db = null;
    }

    public static function dbConnect() : DbHandler{
        return new DbHandler();
    }

}