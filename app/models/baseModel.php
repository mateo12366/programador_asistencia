<?php
namespace App\Models;
use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $dsn = DRIVER . ":host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARSET;
            $this->connection = new PDO($dsn, USERNAME, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    // private function __clone() {}
    // private function __wakeup() {}
}

abstract class BaseModel {
    protected $dbConnection;
    protected $table;

    public function __construct()
    {
        try {
            $this->dbConnection = Database::getInstance()->getConnection();
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getAll(): array
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->dbConnection->query($sql);
            $resul = $statement->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
