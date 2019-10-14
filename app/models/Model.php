<?php
require_once 'app/handlers/db/DbHandler.php';

class Model
{
    public static function all(){
        $stm = DbHandler::dbConnect()->dbQuery("SELECT * FROM ". str_replace('model', '', strtolower(get_called_class())));
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function get($id){
        $stm = DbHandler::dbConnect()->dbQuery("SELECT * FROM ". str_replace('model', '', strtolower(get_called_class())) . " WHERE id = :id");
        $stm->execute([':id' => $id]);

        return $stm->fetchAll();
    }

    //still needs work
    public function __construct(array $values)
    {
        $stm = DbHandler::dbConnect()->dbQuery("INSERT INTO (".  $this->getModelParameterNames() . ") " . $this->getModelName() . " VALUES(:id, :name, :description, :owner, :post, :member)");
        $stm->execute($values);
        var_dump($stm);
    }

    protected function getModelName() : string {
        return str_replace('model', '', strtolower(get_called_class()));
    }

    protected function getModelParameterNames() : string {
        $properties = get_object_vars($this);
        $prop = "";
        for($i = 0; $i < count($properties); $i++) {
            if ($i + 1 == count($properties)){
                $prop = "$prop" . key($properties) . "";
            }else {
                $prop = "$prop" . key($properties) . ", ";
            }
            next($properties);
        }

        return $prop;
    }
}