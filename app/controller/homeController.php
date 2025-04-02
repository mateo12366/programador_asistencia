<?php
namespace App\Controller;

require_once MAIN_APP_ROUTE."../controller/baseController.php";

class HomeController extends BaseController{
    public function __construct()
    {
        $this->layout = 'dashboard_layout';
    }
    //Accion 1 del controllador
    public function index(){
        echo"<br> <CONTROLLER > homeController";
        echo"<br> <ACTION > index";
    }

}
?>