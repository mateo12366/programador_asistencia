<?php

namespace App\Controller;

use App\Models\RegionalModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/regionalesModel.php";

class RegionalesController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'regional_layout';
    }

    public function initRegionales()
    {
        try {
            $objRegional = new RegionalModel();
            $regionales = $objRegional->getAll();
            
            $data = [
                'title' => 'Lista de Regionales',
                "regionales" => $regionales,
            ];
            $this->render("regional/viewRegional.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in RegionalesController->initRegionales: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Regionales',
                "regionales" => [],
                "error" => "Error al cargar las regionales"
            ];
        }
    }

    public function new()
    {
        $this->render('regional/newRegional.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        if ($nombre) {
            $objRegional = new RegionalModel(null, $nombre);
            $resp = $objRegional->save();
            if ($resp) {
                header('Location:/regionales/init');
            } else {
                header('Location:/regionales/init');
            }
        }
    }

    public function view($id)
    {
        $objRegional = new RegionalModel($id);
        $regionalInfo = $objRegional->getRegional();
        $data = [
            "nombre" => $regionalInfo[0]->nombre,
        ];
        $this->render("regional/viewOneRegional.php", $data);
    }

    public function editRegionales($id)
    {
        $objRegional = new RegionalModel($id);
        $regionalInfo = $objRegional->getRegional();
        $data = [
            "infoReal" => $regionalInfo[0],
        ];
        $this->render("regional/editRegional.php", $data);
    }

    public function updateRegionales()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $regionalObjEdit = new RegionalModel($id, $nombre);
            $res = $regionalObjEdit->editRegional();
            if ($res) {
                header('Location:/regionales/init');
            } else {
                header('Location:/regionales/init');
            }
        }
    }

    public function deleteRegionales($id)
    {
        if (isset($id)) {
            $regionalObjDelete = new RegionalModel($id);
            $res = $regionalObjDelete->deleteRegional();
            if ($res) {
                header('Location:/regionales/init');
            } else {
                header('Location:/regionales/init');
            }
        }
    }
}