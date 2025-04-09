<?php
namespace App\Controller;

require_once MAIN_APP_ROUTE."../controller/baseController.php";

class RegisterController extends BaseController {
    public function __construct(){
        $this->layout = 'register_layout';
    }

    public function register(){

        $this->render('\register\register_layout.php');
    }

}
?>