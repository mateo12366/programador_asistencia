<?php

namespace App\Controller;

use App\Models\ActividadModel;
use App\Models\CoordinadorModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/coordinadorModel.php";

class  CoordinadorController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function initCoordinador()
    {
        $objCoordinador = new CoordinadorModel();
        $coordinador = $objCoordinador->getAll();
        $data = [
            "coordinador" => $coordinador
        ];
        $this->render("coordinador/coordinador.php", $data);
    }
}