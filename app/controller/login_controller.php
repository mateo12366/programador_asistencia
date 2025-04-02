<?php

namespace App\Controller;
use App\Models\UserModel;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/userModel.php";

class LoginController extends BaseController
{
    public function __construct()
    {
        //Se define Layaout para el controlador especifico
        $this->layout = 'login_layouts';
        //parent::__construct();
    }
    // public function index(){
    //     if (!isset($_SESSION['tipo_usuario'])) {
    //         header("Location:/login/init");
    //     } else {
    //         if (!in_array($_SESSION['tipo_usuario'], ['paciente','admin'])) {
    //             header("Location:/login/init");
    //         }
    //     }

    //     $usuario = new UserModel();
    //     $usuarios = $usuario->getAll();
    //     $data[
    //         "usuarios"  => $usuarios,
    //     ];
    //     $this->render("/login/index");
    // }
    public function initLogin()
    {
        if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
            //El usuario envio email y contraseña
            $email = trim($_POST['txtEmail']) ?? null;
            $password = trim($_POST['txtPassword']) ?? null;
            $errors = '';
            if ($email != '' && $password != '') {
                $errors = "El usuario y/o contraseña incorrectos";
                $data = [
                    "errors" => $errors
                ];
                $this->render("/login/login.php", $data);
            } else {
                $usrObj = new UserModel(null, $email, $password );
                if ($usrObj->validarLogin($email, $password)) {
                    header("Location:/login/init");
                } else {
                    $errors = "El usuario y/o contraseña no pueden ser vacios";
                    $data = [
                        "errors" => $errors
                    ];
                    $this->render("/login/login.php", $data);
                }
            }
        } else {
            //Sino se renderisa el formulario
            $this->render('login/login.php');
        }
    }

    // public function logout()
    // {
    //     // Destruir todas las sesiones activas
    //     session_destroy();
    //     header("Location:login/init");
    // }
}
