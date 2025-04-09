<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class ClasesModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $fecha = null,
        private ?string $hora_inicio = null,
        private ?string $hora_fin = null,
        private ?string $Competencia = null,
        private ?int $FkIdAmbiente = null,
        private ?int $FkIdInstructor = null,
        private ?int $FkIdFicha = null
    ) {
        parent::__construct();
        $this->table = "clases";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre, fecha, hora_inicio, hora_fin, Competencia, FkIdAmbiente, FkIdInstructor, FkIdFicha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(2, $this->fecha, PDO::PARAM_STR);
            $sql->bindParam(3, $this->hora_inicio, PDO::PARAM_STR);
            $sql->bindParam(4, $this->hora_fin, PDO::PARAM_STR);
            $sql->bindParam(5, $this->Competencia, PDO::PARAM_STR);
            $sql->bindParam(6, $this->FkIdAmbiente, PDO::PARAM_INT);
            $sql->bindParam(7, $this->FkIdInstructor, PDO::PARAM_INT);
            $sql->bindParam(8, $this->FkIdFicha, PDO::PARAM_INT);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getClase()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la clase> " . $ex->getMessage();
        }
    }

    public function editClase()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, fecha=:fecha, hora_inicio=:hora_inicio, hora_fin=:hora_fin, Competencia=:Competencia, FkIdAmbiente=:FkIdAmbiente, FkIdInstructor=:FkIdInstructor, FkIdFicha=:FkIdFicha WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
            $statement->bindParam(":hora_inicio", $this->hora_inicio, PDO::PARAM_STR);
            $statement->bindParam(":hora_fin", $this->hora_fin, PDO::PARAM_STR);
            $statement->bindParam(":Competencia", $this->Competencia, PDO::PARAM_STR);
            $statement->bindParam(":FkIdAmbiente", $this->FkIdAmbiente, PDO::PARAM_INT);
            $statement->bindParam(":FkIdInstructor", $this->FkIdInstructor, PDO::PARAM_INT);
            $statement->bindParam(":FkIdFicha", $this->FkIdFicha, PDO::PARAM_INT);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteClase()
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