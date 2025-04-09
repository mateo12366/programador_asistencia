<?php

namespace App\Controller;

use App\Models\ClasesModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/clasesModel.php";

class ClasesController extends BaseController
{
    public function __construct()
    {   
        $this->layout = 'clase_layout';
    }

    public function initClases()
    {   
        try {
            $objClase = new ClasesModel();
            $clases = $objClase->getAll();
            
            $data = [
                'title' => 'Lista de Clases',
                "clases" => $clases,
            ];
            $this->render("clase/viewClase.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in ClasesController->initClases: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Clases',
                "clases" => [],
                "error" => "Error al cargar las clases"
            ];
            $this->render("clase/viewClase.php", $data);
        }
    }

    public function new()
    {   
        $this->render('clase/newClase.php');
    }

    public function create()
    {   
        $nombre = $_POST['nombre'] ?? null;
        $fecha = $_POST['fecha'] ?? null;
        $hora_inicio = $_POST['hora_inicio'] ?? null;
        $hora_fin = $_POST['hora_fin'] ?? null;
        $competencia = $_POST['competencia'] ?? null;
        $fkIdAmbiente = $_POST['fkIdAmbiente'] ?? null;
        $fkIdInstructor = $_POST['fkIdInstructor'] ?? null;
        $fkIdFicha = $_POST['fkIdFicha'] ?? null;

        if ($nombre && $fecha && $hora_inicio && $hora_fin && $competencia && 
            $fkIdAmbiente && $fkIdInstructor && $fkIdFicha) {
            $objClase = new ClasesModel(
                null, 
                $nombre, 
                $fecha, 
                $hora_inicio, 
                $hora_fin, 
                $competencia, 
                $fkIdAmbiente, 
                $fkIdInstructor, 
                $fkIdFicha
            );
            $resp = $objClase->save();
            if ($resp) {
                header('Location:/clases/init');
            } else {
                header('Location:/clases/init');
            }
        }
    }

    public function view($id)
    {   
        $objClase = new ClasesModel($id);
        $claseInfo = $objClase->getClase();
        $data = [
            "nombre" => $claseInfo[0]->nombre,
            "fecha" => $claseInfo[0]->fecha,
            "hora_inicio" => $claseInfo[0]->hora_inicio,
            "hora_fin" => $claseInfo[0]->hora_fin,
            "competencia" => $claseInfo[0]->Competencia,
            "fkIdAmbiente" => $claseInfo[0]->FkIdAmbiente,
            "fkIdInstructor" => $claseInfo[0]->FkIdInstructor,
            "fkIdFicha" => $claseInfo[0]->FkIdFicha
        ];
        $this->render("clase/viewOneClase.php", $data);
    }

    public function editClases($id)
    {   
        $objClase = new ClasesModel($id);
        $claseInfo = $objClase->getClase();
        $data = [
            "infoReal" => $claseInfo[0],
        ];
        $this->render("clase/editClase.php", $data);
    }

    public function updateClases()
    {   
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $fecha = $_POST["fecha"] ?? null;
            $hora_inicio = $_POST["hora_inicio"] ?? null;
            $hora_fin = $_POST["hora_fin"] ?? null;
            $competencia = $_POST["competencia"] ?? null;
            $fkIdAmbiente = $_POST["fkIdAmbiente"] ?? null;
            $fkIdInstructor = $_POST["fkIdInstructor"] ?? null;
            $fkIdFicha = $_POST["fkIdFicha"] ?? null;

            $claseObjEdit = new ClasesModel(
                $id, 
                $nombre, 
                $fecha, 
                $hora_inicio, 
                $hora_fin, 
                $competencia, 
                $fkIdAmbiente, 
                $fkIdInstructor, 
                $fkIdFicha
            );
            $res = $claseObjEdit->editClase();
            if ($res) {
                header('Location:/clases/init');
            } else {
                header('Location:/clases/init');
            }
        }
    }

    public function deleteClases($id)
    {   
        if (isset($id)) {
            $claseObjDelete = new ClasesModel($id);
            $res = $claseObjDelete->deleteClase();
            if ($res) {
                header('Location:/clases/init');
            } else {
                header('Location:/clases/init');
            }
        }
    }
}