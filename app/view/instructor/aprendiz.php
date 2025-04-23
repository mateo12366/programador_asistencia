<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Crear Aprendiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Tarjeta para crear aprendiz */
        .card {
            background: white;
            width: 250px;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .icono-circular {
            width: 40px;
            height: 40px;
            background-color: #4a90e2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            flex-shrink: 0;
        }

        .card span {
            font-weight: bold;
            color: #333;
            font-size: 16px;
            white-space: nowrap;
        }

        /* Fondo del modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Contenido del modal */
        .modal-contenido {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 500px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        /* Botón de cerrar */
        .cerrar {
            position: absolute;
            top: 10px;
            right: 15px;
            cursor: pointer;
            font-size: 24px;
            color: #333;
        }

        /* Título */
        .modal-contenido h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #000;
            margin-top: 10px;
            font-weight: bold;
        }

        /* Formulario */
        .formulario {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Grupos de campos */
        .campo-grupo {
            width: 48%;
            margin-bottom: 25px;
            position: relative;
        }

        .campo-grupo.completo {
            width: 100%;
        }

        /* Estilos de las etiquetas */
        .campo-grupo label {
            position: absolute;
            top: -12px;
            left: 0;
            font-size: 12px;
            color: #555;
        }

        /* Estilos de los inputs y selects */
        .campo-grupo input,
        .campo-grupo select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Estilos para el botón */
        .btn-crear {
            background-color: #b96edc;
            color: white;
            border: none;
            border-radius: 24px;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 10px auto 0;
            width: auto;
            min-width: 120px;
        }

        /* Estilo para los íconos de dropdown */
        .icon-dropdown {
            position: absolute;
            right: 10px;
            top: 12px;
            color: #777;
            pointer-events: none;
        }
    </style>
</head>

<body>

    <!-- Tarjeta para crear aprendiz -->
    <div class="card" onclick="abrirModal()">
        <div class="icono-circular">
            <i class="fas fa-user-plus"></i>
        </div>
        <span>Crear Aprendiz</span>
    </div>

    <!-- Modal con el nuevo diseño -->
    <div class="modal" id="modal">
        <div class="modal-contenido">
            <span class="cerrar" onclick="cerrarModal()">×</span>
            <h2>Crear Aprendiz</h2>

            <div class="formulario">
                <!-- Primera fila -->
                <div class="campo-grupo">
                    <label for="txtNombre">Nombre Completo</label>
                    <input type="text" id="txtNombre" name="txtNombre">
                </div>

                <div class="campo-grupo">
                    <label for="txtDocumento">Tipo de Documento</label>
                    <select name="txtDocumento" id="txtDocumento">
                        <option value=""></option>
                    </select>
                </div>

                <!-- Segunda fila -->
                <div class="campo-grupo">
                    <label for="txtNumeroDocumento">Número de Documento</label>
                    <input type="text" name="txtNumeroDocumento" id="txtNumeroDocumento">
                </div>

                <div class="campo-grupo">
                    <label for="txtContraseña">Contraseña</label>
                    <input type="password" id="txtContraseña" name="txtContraseña">
                </div>

                <!-- Tercera fila -->
                <div class="campo-grupo">
                    <label for="txtTelefono">Teléfono</label>
                    <input type="tel"id="txtTelefono" name="txtTelefono">
                </div>

                <div class="campo-grupo">
                    <label for="txtEmail">Correo Electrónico</label>
                    <input type="email" id="txtEmail" name="txtEmail">
                </div>

                <!-- Cuarta fila (ancho completo) -->
                <div class="campo-grupo completo">
                    <label for="txtFicha">N° de Ficha</label>
                    <select id="txtFicha" name="txtFicha">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <button class="btn-crear">Crear</button>
        </div>
    </div>

    <script>
        function abrirModal() {
            document.getElementById("modal").style.display = "flex";
        }

        function cerrarModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>

</body>

</html>