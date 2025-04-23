<?php

namespace App\Controller;

use App\Models\ClasesModel;
use App\Models\AmbientesModel;
use App\Models\FichasModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/clasesModel.php";
require_once MAIN_APP_ROUTE . "../models/ambientesModel.php";
require_once MAIN_APP_ROUTE . "../models/fichasModel.php";

class ClasesController extends BaseController
{
    public function __construct()
    {   
        $this->layout = 'clase_layout';
    }

    public function initClases()
    {   
        try {
            $objClase = new ClasesModel();
            $clases = $objClase->getAll();
            
            $data = [
                'title' => 'Lista de Clases',
                "clases" => $clases,
            ];
            $this->render("clase/viewClase.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in ClasesController->initClases: " . $e->getMessage());
            $data = [
                'title' => 'Lista de Clases',
                "clases" => [],
                "error" => "Error al cargar las clases"
            ];
            $this->render("clase/viewClase.php", $data);
        }
    }

    public function new()
    {   
        try {
            $this->layout = 'clase_layout';
            
            // Cargar ambientes y fichas para el formulario
            $ambientesModel = new AmbientesModel();
            $ambientes = $ambientesModel->getAll();
            
            $fichasModel = new FichasModel();
            $fichas = $fichasModel->getAll();
            
            $data = [
                'ambientes' => $ambientes,
                'fichas' => $fichas
            ];
            
            $this->render('clase/newClase.php', $data);
        } catch (Exception $e) {
            error_log("Error in ClasesController->new: " . $e->getMessage());
            $this->render('clase/newClase.php', []);
        }
    }

    public function create()
    {   
        $nombre = $_POST['nombre'] ?? null;
        $fecha = $_POST['fecha'] ?? null;
        $hora_inicio = $_POST['hora_inicio'] ?? null;
        $hora_fin = $_POST['hora_fin'] ?? null;
        $competencia = $_POST['competencia'] ?? null;
        $fkIdAmbiente = $_POST['fkIdAmbiente'] ?? null;
        $fkIdInstructor = $_POST['fkIdInstructor'] ?? null;
        $fkIdFicha = $_POST['fkIdFicha'] ?? null;
        $dia_semana = $_POST['dia_semana'] ?? null;

        if ($nombre && $fecha && $hora_inicio && $hora_fin && $competencia && 
            $fkIdAmbiente && $fkIdInstructor && $fkIdFicha) {
            
            // Convertir la fecha según el día de la semana seleccionado
            if ($dia_semana) {
                $fecha = $this->obtenerFechaPorDiaSemana($dia_semana);
            }
            
            $objClase = new ClasesModel(
                null, 
                $nombre, 
                $fecha, 
                $hora_inicio, 
                $hora_fin, 
                $competencia, 
                $fkIdAmbiente, 
                $fkIdInstructor, 
                $fkIdFicha,
                $dia_semana
            );
            $resp = $objClase->save();
            if ($resp) {
                header('Location:/horario/visualizar');
            } else {
                header('Location:/clases/new');
            }
        } else {
            header('Location:/clases/new');
        }
    }

    // Función para obtener la fecha correspondiente al día de la semana
    private function obtenerFechaPorDiaSemana($diaSemana) {
        $dias = [
            'Lunes' => 1,
            'Martes' => 2,
            'Miercoles' => 3,
            'Jueves' => 4,
            'Viernes' => 5,
            'Sabado' => 6,
            'Domingo' => 0
        ];
        
        $diaNumero = $dias[$diaSemana] ?? 1;
        $fechaActual = new \DateTime();
        $diaSemanaActual = (int)$fechaActual->format('N');
        
        // Calcular la diferencia de días
        $diferencia = $diaNumero - $diaSemanaActual;
        
        // Si la diferencia es negativa, buscamos el día en la próxima semana
        if ($diferencia < 0) {
            $diferencia += 7;
        }
        
        // Añadir la diferencia a la fecha actual
        $fechaActual->modify("+{$diferencia} days");
        
        return $fechaActual->format('Y-m-d');
    }

    public function view($id)
    {   
        $objClase = new ClasesModel($id);
        $claseInfo = $objClase->getClase();
        $data = [
            "nombre" => $claseInfo[0]->nombre,
            "fecha" => $claseInfo[0]->fecha,
            "hora_inicio" => $claseInfo[0]->hora_inicio,
            "hora_fin" => $claseInfo[0]->hora_fin,
            "competencia" => $claseInfo[0]->Competencia,
            "fkIdAmbiente" => $claseInfo[0]->FkIdAmbiente,
            "fkIdInstructor" => $claseInfo[0]->FkIdInstructor,
            "fkIdFicha" => $claseInfo[0]->FkIdFicha,
            "dia_semana" => $claseInfo[0]->dia_semana
        ];
        $this->render("clase/viewOneClase.php", $data);
    }

    public function editClases($id)
    {   
        $objClase = new ClasesModel($id);
        $claseInfo = $objClase->getClase();
        $data = [
            "infoReal" => $claseInfo[0],
        ];
        $this->render("clase/editClase.php", $data);
    }

    public function updateClases()
    {   
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $fecha = $_POST["fecha"] ?? null;
            $hora_inicio = $_POST["hora_inicio"] ?? null;
            $hora_fin = $_POST["hora_fin"] ?? null;
            $competencia = $_POST["competencia"] ?? null;
            $fkIdAmbiente = $_POST["fkIdAmbiente"] ?? null;
            $fkIdInstructor = $_POST["fkIdInstructor"] ?? null;
            $fkIdFicha = $_POST["fkIdFicha"] ?? null;
            $dia_semana = $_POST["dia_semana"] ?? null;

            $claseObjEdit = new ClasesModel(
                $id, 
                $nombre, 
                $fecha, 
                $hora_inicio, 
                $hora_fin, 
                $competencia, 
                $fkIdAmbiente, 
                $fkIdInstructor, 
                $fkIdFicha,
                $dia_semana
            );
            $res = $claseObjEdit->editClase();
            if ($res) {
                header('Location:/clases/init');
            } else {
                header('Location:/clases/init');
            }
        }
    }

    public function deleteClases($id)
    {   
        if (isset($id)) {
            $claseObjDelete = new ClasesModel($id);
            $res = $claseObjDelete->deleteClase();
            if ($res) {
                header('Location:/clases/init');
            } else {
                header('Location:/clases/init');
            }
        }
    }
}