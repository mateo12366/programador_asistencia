<?php
namespace App\Controller;

require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/usuariosModel.php";

use App\Models\UsuariosModel;

class LoginController extends BaseController {
    private $usuariosModel;
    
    public function __construct(){
        $this->layout = 'login_layout';
        $this->usuariosModel = new UsuariosModel();
    }

    public function login(){
        // Display login form
        $this->render('\login\login_layout.php');
    }
    
    public function authenticate(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';
            
            // Validate inputs
            if (empty($correo) || empty($contrasena)) {
                $error = "Por favor, complete todos los campos";
                $this->render('\login\login_layout.php', ['error' => $error]);
                return;
            }
            
            // Attempt to authenticate
            if ($this->usuariosModel->validarLogin($correo, $contrasena)) {
                // Successful login - redirect to dashboard or home page
                header('Location: /dashboard');
                exit;
            } else {
                // Failed login
                $error = "Usuario o contraseña incorrectos";
                $this->render('\login\login_layout.php', ['error' => $error]);
            }
        } else {
            // If not POST request, redirect to login page
            header('Location: /login');
            exit;
        }
    }
    
    public function logout(){
        // Destroy session and redirect to login
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
?>