<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class CentroModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?int $id_regional = null
    ) {
        parent::__construct();
        $this->table = "centros";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre, id_regional) VALUES (?, ?)");
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(2, $this->id_regional, PDO::PARAM_INT);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getCentro()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el centro> " . $ex->getMessage();
        }
    }

    public function editCentro()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, id_regional=:id_regional WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":id_regional", $this->id_regional, PDO::PARAM_INT);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteCentro()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser Eliminado " . $ex->getMessage();
        }
    }
}