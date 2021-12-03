<?php
class EntidadBase
{
    private $db;
    private $conectar;
    public function __construct()
    {
        $this->db = null;
        require_once '../bd/core.php';
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conn();
    }

    public function runQuery($sql)
    {
        try {
            $query = pg_prepare($this->db,"options",$sql);
            $query = pg_execute($this->db,"options");
            while ($row = pg_fetch_object($query)) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (PDOException $e) {
            return "e";
        }
    }

    public function getAll($table)
    {
        $stmt = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        while ($row = $stmt->fetchObject()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function getAllBy($column, $val)
    {
        $stmt = $this->db->query("SELECT * FROM $this->table WHERE $column='$val'");
        while ($row = $stmt->fetchObject()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }
}
