<?php

namespace App\Models;

use Exception;
use PDO;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class FichasModel
{
    private $id;
    private $codigo;
    private $fkIdPrograma;
    private $id_rol;
    private $conexion;

    public function __construct($id = null, $codigo = null, $fkIdPrograma = null, $id_rol = null)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->fkIdPrograma = $fkIdPrograma;
        $this->id_rol = $id_rol;
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM fichas";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log("Error in FichasModel->getAll: " . $e->getMessage());
            return [];
        }
    }

    public function getFicha()
    {
        try {
            $sql = "SELECT * FROM fichas WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log("Error in FichasModel->getFicha: " . $e->getMessage());
            return [];
        }
    }
}