<?php

namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/baseModel.php";


class UserModel extends BaseModel
{

    public function __construct(
        private ?int $id = null,
        private ?string $nombre = null,
        private ?string $correo = null,
        private ?string $contrasenia = null,
        private ?string $fkRol = null,
        private ?string $fkidFicha = null,
        private ?string $estado = null,
    ) {
        parent::__construct();
        $this->table = "usuarios";
    }

    public function validarLogin($email, $contrasenia)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE correo=:correo";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':correo', $correo, PDO::PARAM_STR);
            $statement->execute();
            $resultSet = [];
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            # Si se encuentra el usuario
            if (count($resultSet) > 0) {
                // Recuperamos de la BD, la contraseña encriptada
                $hashed = $resultSet[0]->password;
                if (password_verify($contrasenia, $hashed)) {
                    // Los datos de usuario y contraseña son correctos
                    $_SESSION['rol'] = $resultSet[0]->fkIdRol;
                    $_SESSION['nombre'] = $resultSet[0]->nombre;
                    $_SESSION['id'] = $resultSet[0]->id;
                    $_SESSION['timeout'] = time();
                    session_regenerate_id();
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $ex) {
            echo "Error validando login> " . $ex->getMessage();
        }
    }
}