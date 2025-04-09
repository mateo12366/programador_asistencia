<?php

namespace App\Controller;

use App\Models\ActividadModel;
use App\Models\InstructorModel;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/instructorModel.php";

class  InstructorController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }
    public function initInstructor()
    {
        $objInstructor = new InstructorModel();
        $Instructor = $objInstructor->getAll();
        $data = [
            "instructor" => $Instructor
        ];
        $this->render("instructor/instructor.php", $data);
    }
}