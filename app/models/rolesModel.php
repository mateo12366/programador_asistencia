<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class RolesModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $lectura = null,
        private ?string $escritura = null,
        private ?string $vista = null,
        private ?string $estado = null
    ) {
        parent::__construct();
        $this->table = "roles";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre, lectura, escritura, vista, estado) VALUES (?, ?, ?, ?, ?)");
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(2, $this->lectura, PDO::PARAM_STR);
            $sql->bindParam(3, $this->escritura, PDO::PARAM_STR);
            $sql->bindParam(4, $this->vista, PDO::PARAM_STR);
            $sql->bindParam(5, $this->estado, PDO::PARAM_STR);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getRol()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el rol> " . $ex->getMessage();
        }
    }

    public function editRol()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, lectura=:lectura, escritura=:escritura, vista=:vista, estado=:estado WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":lectura", $this->lectura, PDO::PARAM_STR);
            $statement->bindParam(":escritura", $this->escritura, PDO::PARAM_STR);
            $statement->bindParam(":vista", $this->vista, PDO::PARAM_STR);
            $statement->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteRol()
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