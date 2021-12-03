<?php
class Conectar
{
    private $host, $port, $user, $pass, $database, $options;

    public function __construct()
    {
        $db_cfg = require_once './config/db.php';
        $this->conn = null;
        $this->host = $db_cfg["host"];
        $this->port = $db_cfg["port"];
        $this->user = $db_cfg["user"];
        $this->pass = $db_cfg["pass"];
        $this->options = $db_cfg["options"];
        $this->database = $db_cfg["database"];
    }

    public function conn()
    {
        try {
            $this->conn = pg_connect("host={$this->host} port={$this->port} dbname={$this->database} user={$this->user} password={$this->pass} options='{$this->options}'");
        } catch (Exception $e) {
            echo "Error al conectar con la base de datos: " . $e->getMessage();
        }
        return $this->conn;
    }
}
