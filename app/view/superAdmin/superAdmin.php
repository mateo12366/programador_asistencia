<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Super Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2fa;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 220px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            position: relative;
        }
        .card:hover {
            transform: scale(1.05); /* Hace que se agrande un 5% */
            transition: transform 0.3s ease; /* Transición suave */
            z-index: 10; /* Se pone encima de los demás */
        }
        
        .icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
        }
        .regional { background-color: rgb(104, 104, 206); }
        .centro { background-color: rgb(186, 95, 95); }
        .coordinador { background-color: rgb(79, 150, 79); }
        
        /* MODALES MEJORADOS */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .modal-content {
            background: white;
            border-radius: 10px;
            width: 500px; /* Tamaño aumentado */
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            overflow: hidden; /* Para que el borde radius funcione con los hijos */
        }
        
        /* Barra blanca del encabezado */
        .modal-header {
            background: white;
            padding: 15px 20px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-title {
            margin: 0;
            font-size: 1.4rem;
            color: #333;
            font-weight: 600;
        }
        
        .close {
            cursor: pointer;
            font-size: 24px;
            color: #888;
            background: none;
            border: none;
            transition: color 0.2s;
        }
        
        .close:hover {
            color: #555;
        }
        
        .modal-body {
            padding: 25px;
            background: #f9f9f9;
        }
        
        /* Estilos para los formularios */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        
        .form-control:focus {
            border-color: #4a90e2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
        }
        
        .btn {
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-primary {
            background-color: #28a745;
            color: white;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: #218838;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <div class="header">
        <div>Panel de Super Admin</div>
        <button class="btn btn-link text-dark text-decoration-none">Cerrar Sesión</button>
    </div>

    <h2>Bienvenido, Super Admin</h2>

    <div class="container">
        <div class="card" onclick="mostrarModal('modalRegional')">
            <div class="icon regional"><i class="fas fa-home"></i></div>
            <span>Crear Regional</span>
        </div>
        <div class="card" onclick="mostrarModal('modalCentro')">
            <div class="icon centro"><i class="fas fa-building"></i></div>
            <span>Crear Centro</span>
        </div>
        <div class="card" onclick="mostrarModal('modalCoordinador')">
            <div class="icon coordinador"><i class="fas fa-users"></i></div>
            <span>Crear Coordinador</span>
        </div>
    </div>

    <!-- Modales mejorados -->
    <div id="modalRegional" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Crear Regional</h3>
                <button class="close" onclick="cerrarModal('modalRegional')">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/regional/create" method="post">
                    <div class="form-group">
                        <label for="txtNombreRegional">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombreRegional" id="txtNombreRegional" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalCentro" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Crear Centro</h3>
                <button class="close" onclick="cerrarModal('modalCentro')">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/centro/create" method="post">
                    <div class="form-group">
                        <label for="txtRegionalCentro">Regional:</label>
                        <select class="form-control" name="txtRegionalCentro" id="txtRegionalCentro" required>
                            <option value="">Seleccione una regional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtNombreCentro">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombreCentro" id="txtNombreCentro" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalCoordinador" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Crear Coordinador</h3>
                <button class="close" onclick="cerrarModal('modalCoordinador')">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/coordinador/create" method="post">
                    <div class="form-group">
                        <label for="txtRegional">Regional:</label>
                        <select class="form-control" name="txtRegional" id="txtRegional" required>
                            <option value="">Seleccione una regional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtCentro">Centro:</label>
                        <select class="form-control" name="txtCentro" id="txtCentro" required>
                            <option value="">Seleccione un centro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" required>
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email:</label>
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="txtContraseña">Contraseña:</label>
                        <input type="password" class="form-control" name="txtContraseña" id="txtContraseña" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function mostrarModal(id) {
            document.getElementById(id).style.display = "flex";
        }
        function cerrarModal(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
</body>
</html>
</body>
</html>
