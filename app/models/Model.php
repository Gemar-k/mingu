<?php
require_once 'app/handlers/db/DbHandler.php';

class Model
{
    //get all the data from the database that corresponds to the model
    public static function all(){
        $stm = DbHandler::dbConnect()->dbQuery("SELECT * FROM ". str_replace('model', '', strtolower(get_called_class())));
        $stm->execute();

        return $stm->fetchAll();
    }

    //get specific data from database by id that corresponds to the model
    public static function get($id){
        $stm = DbHandler::dbConnect()->dbQuery("SELECT * FROM ". str_replace('model', '', strtolower(get_called_class())) . " WHERE id = :id");
        $stm->execute([':id' => $id]);

        return $stm->fetchAll();
    }

    //insert new data in database when a new object is created
    public function __construct(array $values)
    {
        $stm = DbHandler::dbConnect()->dbQuery("INSERT INTO ". $this->getModelName() . " (".  $this->getModelParameterNames() . ") " . " VALUES (".$this->getModelValueNames().")");
        $stm->execute($values);
    }

    //get the name of the model that is initiated
    protected function getModelName() : string {
        return str_replace('model', '', strtolower(get_called_class()));
    }

    //get the names of all the parameters in the model in value form
    protected function getModelValueNames() : string {
        return ':'. implode(', :', array_keys(get_object_vars($this)));
    }

    //get the names of all the parameters in the model in parameter form
    protected function getModelParameterNames() : string {
        return implode(', ', array_keys(get_object_vars($this)));
    }
}