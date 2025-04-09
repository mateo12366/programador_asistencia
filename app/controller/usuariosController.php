<?php

namespace App\Controller;

use App\Models\UsuariosModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/usuariosModel.php";

class UsuariosController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'usuario_layout';
    }

    public function initUsuarios()
    {
        try {
            $objUsuario = new UsuariosModel();
            $usuarios = $objUsuario->getAll();
            
            $data = [
                'title' => 'Lista de Usuarios',
                "usuarios" => $usuarios,
            ];
            $this->render("usuario/viewUsuario.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in UsuariosController->initUsuarios: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Usuarios',
                "usuarios" => [],
                "error" => "Error al cargar los usuarios"
            ];
        }
    }

    public function new()
    {
        $this->render('usuario/newUsuario.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        $correo = $_POST['correo'] ?? null;
        $contrasenia = $_POST['contrasenia'] ?? null;
        $rol = $_POST['rol'] ?? null;
        $idFicha = $_POST['idFicha'] ?? null;
        $estado = $_POST['estado'] ?? null;

        if ($nombre && $correo && $contrasenia && $rol) {
            $objUsuario = new UsuariosModel(null, $nombre, $correo, $contrasenia, $rol, $idFicha, $estado);
            $resp = $objUsuario->save();
            if ($resp) {
                header('Location:/usuarios/init');
            } else {
                header('Location:/usuarios/init');
            }
        }
    }

    public function view($id)
    {
        $objUsuario = new UsuariosModel($id);
        $usuarioInfo = $objUsuario->getUsuario();
        $data = [
            "nombre" => $usuarioInfo[0]->nombre,
            "correo" => $usuarioInfo[0]->correo,
            "rol" => $usuarioInfo[0]->rol,
            "idFicha" => $usuarioInfo[0]->idFicha,
            "estado" => $usuarioInfo[0]->estado
        ];
        $this->render("usuario/viewOneUsuario.php", $data);
    }

    public function editUsuarios($id)
    {
        $objUsuario = new UsuariosModel($id);
        $usuarioInfo = $objUsuario->getUsuario();
        $data = [
            "infoReal" => $usuarioInfo[0],
        ];
        $this->render("usuario/editUsuario.php", $data);
    }

    public function updateUsuarios()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $correo = $_POST["correo"] ?? null;
            $contrasenia = $_POST["contrasenia"] ?? null;
            $rol = $_POST["rol"] ?? null;
            $idFicha = $_POST["idFicha"] ?? null;
            $estado = $_POST["estado"] ?? null;

            $usuarioObjEdit = new UsuariosModel($id, $nombre, $correo, $contrasenia, $rol, $idFicha, $estado);
            $res = $usuarioObjEdit->editUsuario();
            if ($res) {
                header('Location:/usuarios/init');
            } else {
                header('Location:/usuarios/init');
            }
        }
    }

    public function deleteUsuarios($id)
    {
        if (isset($id)) {
            $usuarioObjDelete = new UsuariosModel($id);
            $res = $usuarioObjDelete->deleteUsuario();
            if ($res) {
                header('Location:/usuarios/init');
            } else {
                header('Location:/usuarios/init');
            }
        }
    }
}