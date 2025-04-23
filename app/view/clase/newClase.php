<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/clase/newClase.css">
    <title>Horarios</title>
</head>
<body>
    <div class="container-clase">
        <h1 class="h1-clase">Programador Semanal - Instructor</h1>
        
        <form action="/clases/create" method="POST">
            <div class="form-group">
                <label for="nombre">Institución:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-gruop">
                <label for="fecha">Fecha: </label>
                <input type="date" name="fecha" id="fecha">
            </div>
            
            <div class="form-group-clase">
                <label for="fkIdFicha">Ficha:</label>
                <select id="fkIdFicha" name="fkIdFicha" required>
                    <option value="">Seleccione una ficha</option>
                    <?php
                    // Aquí deberías cargar las fichas desde la base de datos
                    if (isset($fichas) && !empty($fichas)) {
                        foreach ($fichas as $ficha) {
                            echo '<option value="' . $ficha->id . '">' . $ficha->codigo . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group-clase">
                <label for="competencia">Competencia:</label>
                <input type="text" id="competencia" name="competencia" required>
            </div>
            
            <div class="form-group-clase">
                <label for="hora_inicio">Hora Inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" required>
            </div>
            
            <div class="form-group-clase">
                <label for="hora_fin">Hora Fin:</label>
                <input type="time" id="hora_fin" name="hora_fin" required>
            </div>
            
            <div class="form-group-clase">
                <label for="dia_semana">Día de la Semana:</label>
                <select id="dia_semana" name="dia_semana" required>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miercoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sabado">Sábado</option>
                </select>
            </div>
            
            <div class="form-group-clase">
                <label for="fkIdAmbiente">Ambiente:</label>
                <select id="fkIdAmbiente" name="fkIdAmbiente" required>
                    <option value="">Seleccione un ambiente</option>
                    <?php
                    // Aquí deberías cargar los ambientes desde la base de datos
                    if (isset($ambientes) && !empty($ambientes)) {
                        foreach ($ambientes as $ambiente) {
                            echo '<option value="' . $ambiente->id . '">' . $ambiente->nombre . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            
            <!-- Campo oculto para la fecha (se puede establecer la fecha actual) -->
            <input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>">
            
            <!-- Campo oculto para el instructor (se puede obtener del usuario logueado) -->
            <input type="hidden" name="fkIdInstructor" value="1">
            
            <div class="btn-container">
                <button type="submit" class="btn-crear">Crear Clase</button>
            </div>
            <div class="btn-container">
                <a href="/clases/init">Volver al horario</a>
            </div>
        </form>
    </div>
</body>
</html>