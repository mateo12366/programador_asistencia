<?php

namespace App\Controller;

use App\Models\ClasesModel;
use Exception;

require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/clasesModel.php";

class HorarioController extends BaseController
{
    public function __construct()
    {   
        $this->layout = 'horario_layout';
    }

    public function visualizar()
    {   
        try {
            $objClase = new ClasesModel();
            $clases = $objClase->getAll();
            
            // Organizar clases por día de la semana
            $clasesPorDia = [
                'Lunes' => [],
                'Martes' => [],
                'Miercoles' => [],
                'Jueves' => [],
                'Viernes' => [],
                'Sabado' => []
            ];
            
            foreach ($clases as $clase) {
                // Determinar el día de la semana a partir de la fecha
                $diaSemana = date('l', strtotime($clase->fecha));
                
                // Convertir el día en inglés al español
                $diasTraducidos = [
                    'Monday' => 'Lunes',
                    'Tuesday' => 'Martes',
                    'Wednesday' => 'Miercoles',
                    'Thursday' => 'Jueves',
                    'Friday' => 'Viernes',
                    'Saturday' => 'Sabado',
                    'Sunday' => 'Domingo'
                ];
                
                $diaSemanaEsp = $diasTraducidos[$diaSemana] ?? 'Lunes';
                
                // Añadir la clase al día correspondiente
                if (isset($clasesPorDia[$diaSemanaEsp])) {
                    $clasesPorDia[$diaSemanaEsp][] = $clase;
                }
            }
            
            $data = [
                'clasesLunes' => $clasesPorDia['Lunes'],
                'clasesMartes' => $clasesPorDia['Martes'],
                'clasesMiercoles' => $clasesPorDia['Miercoles'],
                'clasesJueves' => $clasesPorDia['Jueves'],
                'clasesViernes' => $clasesPorDia['Viernes'],
                'clasesSabado' => $clasesPorDia['Sabado'],
            ];
            
            $this->render("horario/visualizar.php", $data);
            
        } catch (Exception $e) {
            error_log("Error in HorarioController->visualizar: " . $e->getMessage());
            $data = [
                'error' => "Error al cargar el horario"
            ];
            $this->render("horario/visualizar.php", $data);
        }
    }

    public function nuevaClase()
    {
        // Redirigir al método new del ClasesController
        header('Location:/clases/new');
        exit;
    }
}