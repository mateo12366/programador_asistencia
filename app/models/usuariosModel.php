<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";

class UsuariosModel extends BaseModel
{
    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $correo = null,
        private ?string $contrasenia = null,
        private ?string $rol = null,
        private ?int $idFicha = null,
        private ?string $estado = null
    ) {
        parent::__construct();
        $this->table = "usuarios";
    }
    public function validarLogin($correo, $password)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE correo=:correo";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":correo", $correo);
            $statement->execute();
            $resultSet = [];
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }

            if (count($resultSet) > 0) {
                // Recuperamos de la BD, la contraseña encriptada
                $hashed = $resultSet[0]->password;
                if (password_verify($password, $hashed)) {
                    //los datos de usuario y contraseña son correctos
                    $_SESSION['rol'] = $resultSet[0]->FK_id_rol;
                    $_SESSION['nombre'] = $resultSet[0]->nombre;
                    $_SESSION['id'] = $resultSet[0]->id_usuario;
                    $_SESSION['timeout'] = time();
                    session_regenerate_id();
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $ex) {
            echo "Error validando login" . $ex->getMessage();
        }
    }

    public function save()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO $this->table (nombre, correo, contrasenia, rol, idFicha, estado) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $sql->bindParam(2, $this->correo, PDO::PARAM_STR);
            $sql->bindParam(3, $this->contrasenia, PDO::PARAM_STR);
            $sql->bindParam(4, $this->rol, PDO::PARAM_STR);
            $sql->bindParam(5, $this->idFicha, PDO::PARAM_INT);
            $sql->bindParam(6, $this->estado, PDO::PARAM_STR);
            $res = $sql->execute();
            return $res;
        } catch (PDOException $ex) {
            echo "Error en consulta> " . $ex->getMessage();
        }
    }

    public function getUsuario()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el usuario> " . $ex->getMessage();
        }
    }

    public function editUsuario()
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, correo=:correo, contrasenia=:contrasenia, rol=:rol, idFicha=:idFicha, estado=:estado WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindParam(":correo", $this->correo, PDO::PARAM_STR);
            $statement->bindParam(":contrasenia", $this->contrasenia, PDO::PARAM_STR);
            $statement->bindParam(":rol", $this->rol, PDO::PARAM_STR);
            $statement->bindParam(":idFicha", $this->idFicha, PDO::PARAM_INT);
            $statement->bindParam(":estado", $this->estado, PDO::PARAM_STR);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser editado: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteUsuario()
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
            $resp = $statement->execute();
            return $resp;
        } catch (PDOException $ex) {
            echo "El registro no pudo ser Eliminado " . $ex->getMessage();
        }
    }
}