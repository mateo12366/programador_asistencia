<?php

namespace App\Controller;

use App\Models\ActividadModel;
use App\Models\SuperAdminModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/superAdminModel.php";

class  SuperAdminController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function initSuperAdmin()
    {
        $objSuperAdmin = new SuperAdminModel();
        $superAdmin = $objSuperAdmin->getAll();
        $data = [
            "superAdmin" => $superAdmin
        ];
        $this->render("superAdmin/superAdmin.php", $data);
    }
}