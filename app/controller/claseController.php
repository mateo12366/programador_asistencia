<?php

namespace App\Controller;

use App\Models\ActividadModel;
use App\Models\ClaseModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/claseModel.php";

class  ClaseController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function initClase()
    {
        $objClase = new ClaseModel();
        $clase = $objClase->getAll();
        $data = [
            "clases" => $clase
        ];
        $this->render("clase/clase.php", $data);
    }
}