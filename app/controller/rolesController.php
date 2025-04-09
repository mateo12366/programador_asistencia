<?php

namespace App\Controller;

use App\Models\RolesModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controllers/baseController.php";
require_once MAIN_APP_ROUTE . "../models/rolesModel.php";

class RolesController extends BaseController
{
    public function __construct()
    {
        $this->layout = 'roles_layout';
    }

    public function initRoles()
    {
        try {
            $objRol = new RolesModel();
            $roles = $objRol->getAll();
            
            $data = [
                'title' => 'Lista de Roles',
                "roles" => $roles,
            ];
            $this->render("roles/viewRoles.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in RolesController->initRoles: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Roles',
                "roles" => [],
                "error" => "Error al cargar los roles"
            ];
        }
    }

    public function new()
    {
        $this->render('roles/newRol.php');
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? null;
        $lectura = $_POST['lectura'] ?? null;
        $escritura = $_POST['escritura'] ?? null;
        $vista = $_POST['vista'] ?? null;
        $estado = $_POST['estado'] ?? null;

        if ($nombre) {
            $objRol = new RolesModel(null, $nombre, $lectura, $escritura, $vista, $estado);
            $resp = $objRol->save();
            if ($resp) {
                header('Location:/roles/init');
            } else {
                header('Location:/roles/init');
            }
        }
    }

    public function view($id)
    {
        $objRol = new RolesModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "nombre" => $rolInfo[0]->nombre,
            "lectura" => $rolInfo[0]->lectura,
            "escritura" => $rolInfo[0]->escritura,
            "vista" => $rolInfo[0]->vista,
            "estado" => $rolInfo[0]->estado
        ];
        $this->render("roles/viewOneRol.php", $data);
    }

    public function editRoles($id)
    {
        $objRol = new RolesModel($id);
        $rolInfo = $objRol->getRol();
        $data = [
            "infoReal" => $rolInfo[0],
        ];
        $this->render("roles/editRol.php", $data);
    }

    public function updateRoles()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $lectura = $_POST["lectura"] ?? null;
            $escritura = $_POST["escritura"] ?? null;
            $vista = $_POST["vista"] ?? null;
            $estado = $_POST["estado"] ?? null;

            $rolObjEdit = new RolesModel($id, $nombre, $lectura, $escritura, $vista, $estado);
            $res = $rolObjEdit->editRol();
            if ($res) {
                header('Location:/roles/init');
            } else {
                header('Location:/roles/init');
            }
        }
    }

    public function deleteRoles($id)
    {
        if (isset($id)) {
            $rolObjDelete = new RolesModel($id);
            $res = $rolObjDelete->deleteRol();
            if ($res) {
                header('Location:/roles/init');
            } else {
                header('Location:/roles/init');
            }
        }
    }
}