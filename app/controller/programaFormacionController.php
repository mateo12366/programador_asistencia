<?php

namespace App\Controller;

use App\Models\ProgramasFormacionModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/programasFormacionModel.php";

class ProgramasFormacionController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'programa_formacion_layout';
    }

    public function initProgramasFormacion()
    {
        try {
            $objPrograma = new ProgramasFormacionModel();
            $programas = $objPrograma->getAll();
            
            $data = [
                'title' => 'Lista de Programas de Formación',
                "programas" => $programas,
            ];
            $this->render("programa_formacion/viewProgramaFormacion.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in ProgramasFormacionController->initProgramasFormacion: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Programas de Formación',
                "programas" => [],
                "error" => "Error al cargar los programas"
            ];
        }
    }

    public function new()
    {
        $this->render('programa_formacion/newProgramaFormacion.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        if ($nombre) {
            $objPrograma = new ProgramasFormacionModel(null, $nombre);
            $resp = $objPrograma->save();
            if ($resp) {
                header('Location:/programas-formacion/init');
            } else {
                header('Location:/programas-formacion/init');
            }
        }
    }

    public function view($id)
    {
        $objPrograma = new ProgramasFormacionModel($id);
        $programaInfo = $objPrograma->getProgramaFormacion();
        $data = [
            "nombre" => $programaInfo[0]->nombre,
        ];
        $this->render("programa_formacion/viewOneProgramaFormacion.php", $data);
    }

    public function editProgramasFormacion($id)
    {
        $objPrograma = new ProgramasFormacionModel($id);
        $programaInfo = $objPrograma->getProgramaFormacion();
        $data = [
            "infoReal" => $programaInfo[0],
        ];
        $this->render("programa_formacion/editProgramaFormacion.php", $data);
    }

    public function updateProgramasFormacion()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $programaObjEdit = new ProgramasFormacionModel($id, $nombre);
            $res = $programaObjEdit->editProgramaFormacion();
            if ($res) {
                header('Location:/programas-formacion/init');
            } else {
                header('Location:/programas-formacion/init');
            }
        }
    }

    public function deleteProgramasFormacion($id)
    {
        if (isset($id)) {
            $programaObjDelete = new ProgramasFormacionModel($id);
            $res = $programaObjDelete->deleteProgramaFormacion();
            if ($res) {
                header('Location:/programas-formacion/init');
            } else {
                header('Location:/programas-formacion/init');
            }
        }
    }
}