<?php

class DbHandler
{

    private $db;

    public $table_name;

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

    public function select($query){
        $query_db = $this->db->query($query);
        $result = $query_db->fetchAll();

        $this->dbDisconnect();
        return $result;
    }

    public function table($table){
        $this->table_name = $table;

        return $this;
    }

    public function insert($data){
        $query_db = $this->db->prepare("INSERT INTO $this->table_name values($data)");
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