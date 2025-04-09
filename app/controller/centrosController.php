<?php

namespace App\Controller;

use App\Models\CentroModel;
use App\Models\RegionalModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/centroModel.php";
require_once MAIN_APP_ROUTE . "../models/regionalModel.php";

class CentrosController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'centro_layout';
    }

    public function initCentros()
    {
        try {
            $objCentro = new CentroModel();
            $centros = $objCentro->getAll();
            
            $data = [
                'title' => 'Lista de Centros',
                "centros" => $centros,
            ];
            $this->render("centro/viewCentro.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in CentrosController->initCentros: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Centros',
                "centros" => [],
                "error" => "Error al cargar los centros"
            ];
            $this->render("centro/viewCentro.php", $data);
        }
    }

    public function new()
    {
        $objRegional = new RegionalModel();
        $regionales = $objRegional->getAll();
        $data = [
            "regionales" => $regionales
        ];
        $this->render('centro/newCentro.php', $data);
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        $idRegional = $_POST['idRegional'] ?? null;
        if ($nombre && $idRegional) {
            $objCentro = new CentroModel(null, $nombre, $idRegional);
            $resp = $objCentro->save();
            if ($resp) {
                header('Location:/centros/init');
            } else {
                header('Location:/centros/init');
            }
        }
    }

    public function view($id)
    {
        $objCentro = new CentroModel($id);
        $centroInfo = $objCentro->getCentro();
        $data = [
            "nombre" => $centroInfo[0]->nombre,
            "nombreRegional" => $centroInfo[0]->nombreRegional
        ];
        $this->render("centro/viewOneCentro.php", $data);
    }

    public function editCentros($id)
    {
        $objCentro = new CentroModel($id);
        $centroInfo = $objCentro->getCentro();
        
        $objRegional = new RegionalModel();
        $regionales = $objRegional->getAll();
        
        $data = [
            "infoReal" => $centroInfo[0],
            "regionales" => $regionales
        ];
        $this->render("centro/editCentro.php", $data);
    }

    public function updateCentros()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $centroObjEdit = new CentroModel($id, $nombre, $idRegional);
            $res = $centroObjEdit->editCentro();
            if ($res) {
                header('Location:/centros/init');
            } else {
                header('Location:/centros/init');
            }
        }
    }

    public function deleteCentros($id)
    {
        if (isset($id)) {
            $centroObjDelete = new CentroModel($id);
            $res = $centroObjDelete->deleteCentro();
            if ($res) {
                header('Location:/centros/init');
            } else {
                header('Location:/centros/init');
            }
        }
    }
}