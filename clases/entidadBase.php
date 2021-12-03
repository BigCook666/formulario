<?php

class ModeloBase
{
    // database config 
    function __construct()
    {
        $this->db = null;
        require_once './bd/core.php';
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conn();
    }

    public function close_db()
    {
        if (!pg_close($this->db)) {
            print "Failed to close connection to " . pg_host($this->db) . ": " .
                pg_last_error($this->db) . "<br/>\n";
        }
    }

    public function runQuery($sql)
    {
        try {
            $query = pg_query($this->db, $sql);
            while ($row = pg_fetch_object($query)) {
                $resultSet[] = $row;
            }
            $this->close_db();
            return $resultSet;
        } catch (PDOException $e) {
            $this->close_db();
            throw $e;
        }
    }

    public function selectTable($table)
    {
        try {
            $query = pg_prepare($this->db, "select", "SELECT * FROM modalidad_tramite_e1 WHERE id = $1");
            $query = pg_execute($this->db, "select", array($table));
            $res = pg_fetch_object($query);
            $this->close_db();
            return $res;
        } catch (Exception $e) {
            $this->close_db();
            throw $e;
        }
    }
}
