<div class="horario-header">
    <h2>Horario Semanal</h2>
    <a href="/horario/nuevaClase" class="btn-nueva-clase">Nueva Clase</a>
</div>

<div class="container">
    <div class="hora">
        <h3>Hora</h3>
    </div>
    <div class="dia">
        <h3>Lunes</h3>
    </div>
    <div class="dia">
        <h3>Martes</h3>
    </div>
    <div class="dia">
        <h3>Miercoles</h3>
    </div>
    <div class="dia">
        <h3>Jueves</h3>
    </div>
    <div class="dia">
        <h3>Viernes</h3>
    </div>
    <div class="dia">
        <h3>Sabado</h3>
    </div>
    
    <?php
    $horas = [
        '7:00 AM', '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 AM',
        '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM',
        '7:00 PM', '8:00 PM', '9:00 PM', '10:00 PM'
    ];
    
    foreach ($horas as $hora) {
        echo '<div class="hora"><h4>' . $hora . '</h4></div>';
        
        // Lunes
        echo '<div class="dia">';
        if (isset($clasesLunes) && !empty($clasesLunes)) {
            foreach ($clasesLunes as $clase) {
                $horaInicio = date('g:i A', strtotime($clase->hora_inicio));
                $horaFin = date('g:i A', strtotime($clase->hora_fin));
                
                if (strpos($hora, substr($horaInicio, 0, 5)) !== false) {
                    echo '<div class="clase-item">';
                    echo '<p><strong>' . $clase->nombre . '</strong></p>';
                    echo '<p>Competencia: ' . $clase->Competencia . '</p>';
                    echo '<p>Hora: ' . $horaInicio . ' - ' . $horaFin . '</p>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
        
        // Martes
        echo '<div class="dia">';
        if (isset($clasesMartes) && !empty($clasesMartes)) {
            foreach ($clasesMartes as $clase) {
                $horaInicio = date('g:i A', strtotime($clase->hora_inicio));
                $horaFin = date('g:i A', strtotime($clase->hora_fin));
                
                if (strpos($hora, substr($horaInicio, 0, 5)) !== false) {
                    echo '<div class="clase-item">';
                    echo '<p><strong>' . $clase->nombre . '</strong></p>';
                    echo '<p>Competencia: ' . $clase->Competencia . '</p>';
                    echo '<p>Hora: ' . $horaInicio . ' - ' . $horaFin . '</p>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
        
        // Miércoles
        echo '<div class="dia">';
        if (isset($clasesMiercoles) && !empty($clasesMiercoles)) {
            foreach ($clasesMiercoles as $clase) {
                $horaInicio = date('g:i A', strtotime($clase->hora_inicio));
                $horaFin = date('g:i A', strtotime($clase->hora_fin));
                
                if (strpos($hora, substr($horaInicio, 0, 5)) !== false) {
                    echo '<div class="clase-item">';
                    echo '<p><strong>' . $clase->nombre . '</strong></p>';
                    echo '<p>Competencia: ' . $clase->Competencia . '</p>';
                    echo '<p>Hora: ' . $horaInicio . ' - ' . $horaFin . '</p>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
        
        // Jueves
        echo '<div class="dia">';
        if (isset($clasesJueves) && !empty($clasesJueves)) {
            foreach ($clasesJueves as $clase) {
                $horaInicio = date('g:i A', strtotime($clase->hora_inicio));
                $horaFin = date('g:i A', strtotime($clase->hora_fin));
                
                if (strpos($hora, substr($horaInicio, 0, 5)) !== false) {
                    echo '<div class="clase-item">';
                    echo '<p><strong>' . $clase->nombre . '</strong></p>';
                    echo '<p>Competencia: ' . $clase->Competencia . '</p>';
                    echo '<p>Hora: ' . $horaInicio . ' - ' . $horaFin . '</p>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
        
        // Viernes
        echo '<div class="dia">';
        if (isset($clasesViernes) && !empty($clasesViernes)) {
            foreach ($clasesViernes as $clase) {
                $horaInicio = date('g:i A', strtotime($clase->hora_inicio));
                $horaFin = date('g:i A', strtotime($clase->hora_fin));
                
                if (strpos($hora, substr($horaInicio, 0, 5)) !== false) {
                    echo '<div class="clase-item">';
                    echo '<p><strong>' . $clase->nombre . '</strong></p>';
                    echo '<p>Competencia: ' . $clase->Competencia . '</p>';
                    echo '<p>Hora: ' . $horaInicio . ' - ' . $horaFin . '</p>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
        
        // Sábado
        echo '<div class="dia">';
        if (isset($clasesSabado) && !empty($clasesSabado)) {
            foreach ($clasesSabado as $clase) {
                $horaInicio = date('g:i A', strtotime($clase->hora_inicio));
                $horaFin = date('g:i A', strtotime($clase->hora_fin));
                
                if (strpos($hora, substr($horaInicio, 0, 5)) !== false) {
                    echo '<div class="clase-item">';
                    echo '<p><strong>' . $clase->nombre . '</strong></p>';
                    echo '<p>Competencia: ' . $clase->Competencia . '</p>';
                    echo '<p>Hora: ' . $horaInicio . ' - ' . $horaFin . '</p>';
                    echo '</div>';
                }
            }
        }
        echo '</div>';
    }
    ?>
</div>

<style>
    .horario-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 0 20px;
    }
    
    .btn-nueva-clase {
        background-color: #009879;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 4px;
    }
    
    .btn-nueva-clase:hover {
        background-color: #007f67;
    }
    
    .clase-item {
        background-color: #e6f7ff;
        border-left: 4px solid #1890ff;
        padding: 5px;
        margin-bottom: 5px;
        border-radius: 3px;
        font-size: 12px;
    }
    
    .clase-item p {
        margin: 2px 0;
    }
</style>