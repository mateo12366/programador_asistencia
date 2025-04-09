<?php

namespace App\Controller;

use App\Models\AsistenciasModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/asistenciasModel.php";

class AsistenciasController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'asistencia_layout';
    }

    public function initAsistencias()
    {
        try {
            $objAsistencia = new AsistenciasModel();
            $asistencias = $objAsistencia->getAll();
            
            $data = [
                'title' => 'Lista de Asistencias',
                "asistencias" => $asistencias,
            ];
            $this->render("asistencia/viewAsistencia.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in AsistenciasController->initAsistencias: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Asistencias',
                "asistencias" => [],
                "error" => "Error al cargar las asistencias"
            ];
        }
    }

    public function new()
    {
        $this->render('asistencia/newAsistencia.php');
    }

    public function create()
    {
        $idAprendiz = $_POST['idAprendiz'] ?? null;
        $idClase = $_POST['idClase'] ?? null;
        $estado = $_POST['estado'] ?? null;
        $horaInasistencia = $_POST['horaInasistencia'] ?? null;

        if ($idAprendiz && $idClase && $estado) {
            $objAsistencia = new AsistenciasModel(null, $idAprendiz, $idClase, $estado, $horaInasistencia);
            $resp = $objAsistencia->save();
            if ($resp) {
                header('Location:/asistencias/init');
            } else {
                header('Location:/asistencias/init');
            }
        }
    }

    public function view($id)
    {
        $objAsistencia = new AsistenciasModel($id);
        $asistenciaInfo = $objAsistencia->getAsistencia();
        $data = [
            "idAprendiz" => $asistenciaInfo[0]->idAprendiz,
            "idClase" => $asistenciaInfo[0]->idClase,
            "estado" => $asistenciaInfo[0]->estado,
            "horaInasistencia" => $asistenciaInfo[0]->horaInasistencia
        ];
        $this->render("asistencia/viewOneAsistencia.php", $data);
    }

    public function editAsistencias($id)
    {
        $objAsistencia = new AsistenciasModel($id);
        $asistenciaInfo = $objAsistencia->getAsistencia();
        $data = [
            "infoReal" => $asistenciaInfo[0],
        ];
        $this->render("asistencia/editAsistencia.php", $data);
    }

    public function updateAsistencias()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $idAprendiz = $_POST["idAprendiz"] ?? null;
            $idClase = $_POST["idClase"] ?? null;
            $estado = $_POST["estado"] ?? null;
            $horaInasistencia = $_POST["horaInasistencia"] ?? null;

            $asistenciaObjEdit = new AsistenciasModel($id, $idAprendiz, $idClase, $estado, $horaInasistencia);
            $res = $asistenciaObjEdit->editAsistencia();
            if ($res) {
                header('Location:/asistencias/init');
            } else {
                header('Location:/asistencias/init');
            }
        }
    }

    public function deleteAsistencias($id)
    {
        if (isset($id)) {
            $asistenciaObjDelete = new AsistenciasModel($id);
            $res = $asistenciaObjDelete->deleteAsistencia();
            if ($res) {
                header('Location:/asistencias/init');
            } else {
                header('Location:/asistencias/init');
            }
        }
    }
}