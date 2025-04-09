<?php

namespace App\Controller;

use App\Models\AmbientesModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/ambientesModel.php";

class AmbientesController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'ambiente_layout';
    }

    public function initAmbientes()
    {
        try {
            $objAmbiente = new AmbientesModel();
            $ambientes = $objAmbiente->getAll();
            
            $data = [
                'title' => 'Lista de Ambientes',
                "ambientes" => $ambientes,
            ];
            $this->render("ambiente/viewAmbiente.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in AmbientesController->initAmbientes: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Ambientes',
                "ambientes" => [],
                "error" => "Error al cargar los ambientes"
            ];
        }
    }

    public function new()
    {
        $this->render('ambiente/newAmbiente.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        $idCentro = $_POST['idCentro'] ?? null;
        if ($nombre && $idCentro) {
            $objAmbiente = new AmbientesModel(null, $nombre, $idCentro);
            $resp = $objAmbiente->save();
            if ($resp) {
                header('Location:/ambientes/init');
            } else {
                header('Location:/ambientes/init');
            }
        }
    }

    public function view($id)
    {
        $objAmbiente = new AmbientesModel($id);
        $ambienteInfo = $objAmbiente->getAmbiente();
        $data = [
            "nombre" => $ambienteInfo[0]->nombre,
            "idCentro" => $ambienteInfo[0]->idCentro
        ];
        $this->render("ambiente/viewOneAmbiente.php", $data);
    }

    public function editAmbientes($id)
    {
        $objAmbiente = new AmbientesModel($id);
        $ambienteInfo = $objAmbiente->getAmbiente();
        $data = [
            "infoReal" => $ambienteInfo[0],
        ];
        $this->render("ambiente/editAmbiente.php", $data);
    }

    public function updateAmbientes()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $ambienteObjEdit = new AmbientesModel($id, $nombre, $idCentro);
            $res = $ambienteObjEdit->editAmbiente();
            if ($res) {
                header('Location:/ambientes/init');
            } else {
                header('Location:/ambientes/init');
            }
        }
    }

    public function deleteAmbientes($id)
    {
        if (isset($id)) {
            $ambienteObjDelete = new AmbientesModel($id);
            $res = $ambienteObjDelete->deleteAmbiente();
            if ($res) {
                header('Location:/ambientes/init');
            } else {
                header('Location:/ambientes/init');
            }
        }
    }
}