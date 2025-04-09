<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class AsistenciasModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?int $idAprendiz = null,
        private ?int $idClase = null,
        private ?string $estado = null,
        private ?string $horaInasistencia = null
    ) {
        parent::__construct();
        $this->table = "asistencias";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (idAprendiz, idClase, estado, horaInasistencia) VALUES (?, ?, ?, ?)");
            $sql->bindParam(1, $this->idAprendiz, PDO::PARAM_INT);
            $sql->bindParam(2, $this->idClase, PDO::PARAM_INT);
            $sql->bindParam(3, $this->estado, PDO::PARAM_STR);
            $sql->bindParam(4, $this->horaInasistencia, PDO::PARAM_STR);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getAsistencia()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia> " . $ex->getMessage();
        }
    }

    public function editAsistencia()
    {
        try {
            $sql = "UPDATE $this->table SET idAprendiz=:idAprendiz, idClase=:idClase, estado=:estado, horaInasistencia=:horaInasistencia WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":idAprendiz", $this->idAprendiz, PDO::PARAM_INT);
            $statement->bindParam(":idClase", $this->idClase, PDO::PARAM_INT);
            $statement->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $statement->bindParam(":horaInasistencia", $this->horaInasistencia, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteAsistencia()
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