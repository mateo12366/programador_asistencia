<?php

namespace App\Models;

use Exception;
use PDO;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class AmbientesModel
{
    private $id;
    private $nombre;

    public function __construct($id = null, $nombre = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM ambientes";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log("Error in AmbientesModel->getAll: " . $e->getMessage());
            return [];
        }
    }

    public function getAmbiente()
    {
        try {
            $sql = "SELECT * FROM ambientes WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            error_log("Error in AmbientesModel->getAmbiente: " . $e->getMessage());
            return [];
        }
    }
}