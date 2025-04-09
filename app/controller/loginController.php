<?php
namespace App\Controller;

require_once MAIN_APP_ROUTE."../controller/baseController.php";

class LoginController extends BaseController {
    public function __construct(){
        $this->layout = 'login_layout';
    }

    public function login(){

        $this->render('\login\login_layout.php');
    }

}
?>  