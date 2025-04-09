<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class FichasModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $codigo = null,
        private ?int $idPrograma = null
    ) {
        parent::__construct();
        $this->table = "fichas";
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (codigo, idPrograma) VALUES (?, ?)");
            $sql->bindParam(1, $this->codigo, PDO::PARAM_STR);
            $sql->bindParam(2, $this->idPrograma, PDO::PARAM_INT);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getFicha()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la ficha> " . $ex->getMessage();
        }
    }

    public function editFicha()
    {
        try {
            $sql = "UPDATE $this->table SET codigo=:codigo, idPrograma=:idPrograma WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":codigo", $this->codigo, PDO::PARAM_STR);
            $statement->bindParam(":idPrograma", $this->idPrograma, PDO::PARAM_INT);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteFicha()
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