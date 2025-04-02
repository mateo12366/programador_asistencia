<?php
namespace App\Models;
use PDO;
use PDOException;

abstract class BaseModel {
    protected $dbConnection;
    protected $table;

    public function __construct(){
        // Se genera la coneccion a la base de datos
        $dbConfig = require_once MAIN_APP_ROUTE."../config/Database.php";
        try {
            $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
            $this->dbConnection = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
    public function getAll():array{
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->dbConnection->query($sql);  
            //Obtenemos los datos en un array asociativo
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
?>