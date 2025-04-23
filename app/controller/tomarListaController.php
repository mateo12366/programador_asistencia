<?php
namespace App\Controller;

require_once MAIN_APP_ROUTE. "../controller/baseController.php";

class TomarListaController extends BaseController {
    public function __construct() 
    {
        $this->layout = 'lista_layout';
    }
    public function index() {
        // # Crear una instancia del modelo Visualizar Horario
        // $visualizarHorario = new VisualizarHorarioModel();
        // # Obtener todos los horarios desde el modelo
        // $horarios = $visualizarHorario->getAll();
        // # Pasar los datos a la vista
        // $data = [
        //     'title' => 'Visualizar Horarios',
        //     'horarios' => $horarios
        // ];
        # Renderizar la vista a traves del metodo de BaseController
        $this->render('tomar_lista/tomar_lista.php');
    }
}
?>