<?php

namespace App\Controller;

use App\Models\FichasModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/fichasModel.php";

class FichasController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'ficha_layout';
    }

    public function initFichas()
    {
        try {
            $objFicha = new FichasModel();
            $fichas = $objFicha->getAll();
            
            $data = [
                'title' => 'Lista de Fichas',
                "fichas" => $fichas,
            ];
            $this->render("ficha/viewFicha.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in FichasController->initFichas: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Fichas',
                "fichas" => [],
                "error" => "Error al cargar las fichas"
            ];
        }
    }

    public function new()
    {
        $this->render('ficha/newFicha.php');
    }

    public function create()
    {
        $codigo = $_POST['codigo'] ?? null;
        $idPrograma = $_POST['idPrograma'] ?? null;
        if ($codigo && $idPrograma) {
            $objFicha = new FichasModel(null, $codigo, $idPrograma);
            $resp = $objFicha->save();
            if ($resp) {
                header('Location:/fichas/init');
            } else {
                header('Location:/fichas/init');
            }
        }
    }

    public function view($id)
    {
        $objFicha = new FichasModel($id);
        $fichaInfo = $objFicha->getFicha();
        $data = [
            "codigo" => $fichaInfo[0]->codigo,
            "idPrograma" => $fichaInfo[0]->idPrograma
        ];
        $this->render("ficha/viewOneFicha.php", $data);
    }

    public function editFichas($id)
    {
        $objFicha = new FichasModel($id);
        $fichaInfo = $objFicha->getFicha();
        $data = [
            "infoReal" => $fichaInfo[0],
        ];
        $this->render("ficha/editFicha.php", $data);
    }

    public function updateFichas()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $codigo = $_POST["codigo"] ?? null;
            $idPrograma = $_POST["idPrograma"] ?? null;
            $fichaObjEdit = new FichasModel($id, $codigo, $idPrograma);
            $res = $fichaObjEdit->editFicha();
            if ($res) {
                header('Location:/fichas/init');
            } else {
                header('Location:/fichas/init');
            }
        }
    }

    public function deleteFichas($id)
    {
        if (isset($id)) {
            $fichaObjDelete = new FichasModel($id);
            $res = $fichaObjDelete->deleteFicha();
            if ($res) {
                header('Location:/fichas/init');
            } else {
                header('Location:/fichas/init');
            }
        }
    }
}