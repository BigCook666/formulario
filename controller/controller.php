<?php
class Controller
{

    function __construct()
    {
        require_once './clases/entidadBase.php';
        $this->modeloBase = new ModeloBase();
    }

    public function getData($sql)
    {
        return $this->modeloBase->runQuery($sql);
    }

    public function getTable($table)
    {
       return $this->modeloBase->selectTable($table); 
    }
}
