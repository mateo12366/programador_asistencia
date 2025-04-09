<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Super Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
  
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
