<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Coordinador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f2fa;
        }
        
        .header {
            background-color: white;
            border-bottom: 1px solid #d0d0d0;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .welcome {
            margin-bottom: 30px;
        }
        
        /* Tarjetas compactas rediseñadas */
        .card {
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-bottom: 15px;
            height: 80px;
            display: flex;
            align-items: center;
            padding: 0 15px;
            background-color: white;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        
            /* 👉 Esta línea es clave para ícono + texto en fila */
            flex-direction: row;
        }
        
        
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        /* Icono circular a la izquierda */
        .icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        /* Título a la derecha */
        .card-title {
            margin: 0;
            font-size: 1rem;
            font-weight: 500;
            color: #333;
            flex-grow: 1;
            text-align: left;
        }
        
        /* Colores de iconos */
        .bg-light-blue {
            background-color: #d0e8f2;
            color: #4682b4;
        }
        
        .bg-purple {
            background-color: #f0d0f0;
            color: #9370db;
        }
        
        .bg-light-green {
            background-color: #d0f0d0;
            color: #4CAF50;
        }
        
        .bg-light-yellow {
            background-color: #faf0d0;
            color: #FFC107;
        }
        
        .bg-light-red {
            background-color: #fad0d0;
            color: #F44336;
        }
        
        .bg-light-blue-info {
            background-color: #d0e0fa;
            color: #2196F3;
        }
        
        .btn-purple {
            background-color: rgb(182, 59, 182);
            color: white;
        }
        
        /* Ajustes de grid para tarjetas más pequeñas */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 15px;
        }
    </style>
</head>
<body>
 
    <div class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="m-0">Panel de Coordinador</h2>
            <button class="btn btn-link text-dark text-decoration-none">Cerrar Sesión</button>
        </div>
    </div>

    <div class="container">
     
        <div class="welcome">
            <h3>Bienvenido, Coordinador</h3>
        </div>

        <!-- Cards Container -->
        <div class="cards-container">
            <!-- Card 1 -->
            <div class="card" data-bs-toggle="modal" data-bs-target="#modalProgramas">
                <div class="icon-circle bg-light-blue">
                    <i class="fas fa-folder-plus"></i>
                </div>
                <h5 class="card-title">Crear Programas</h5>
            </div>
            
            <!-- Card 2 -->
            <div class="card" data-bs-toggle="modal" data-bs-target="#modalAmbiente">
                <div class="icon-circle bg-purple">
                    <i class="fas fa-building"></i>
                </div>
                <h5 class="card-title">Crear Ambientes</h5>
            </div>
            
            <!-- Card 3 -->
            <div class="card" data-bs-toggle="modal" data-bs-target="#modalFicha">
                <div class="icon-circle bg-light-green">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Crear Fichas</h5>
            </div>
            
            <!-- Card 4 -->
            <div class="card" data-bs-toggle="modal" data-bs-target="#modalInstructor">
                <div class="icon-circle bg-light-yellow">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h5 class="card-title">Crear Instructores</h5>
            </div>
            
            <!-- Card 5 -->
            <div class="card" data-bs-toggle="modal" data-bs-target="#modalEstudiante">
                <div class="icon-circle bg-light-red">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h5 class="card-title">Crear Aprendices</h5>
            </div>
            
            <!-- Card 6 -->
            <div class="card" data-bs-toggle="modal" data-bs-target="#modalClase">
                <div class="icon-circle bg-light-blue-info">
                    <i class="fas fa-book-open"></i>
                </div>
                <h5 class="card-title">Crear Clases</h5>
            </div>
        </div>
    </div>
    <!-- Modal Programas -->
    <div class="modal fade" id="modalProgramas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Programas de Formación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" id="txtNombrePrograma" name="txtNombrePrograma" placeholder="Nombre del programa">
                    <button class="btn btn-purple"><i class="fas fa-calendar-alt"></i> Crear</button>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Instructor -->
    <div class="modal fade" id="modalInstructor" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear un Instructor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" id="txtInstructor" name="txtInstructor" placeholder="Nombre del Instructor">
                    <button class="btn btn-purple"><i class="fas fa-calendar-alt"></i> Crear</button>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ficha -->
    <div class="modal fade" id="modalFicha" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear una Ficha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" placeholder="Nombre de la Ficha">
                    <button class="btn btn-purple"><i class="fas fa-calendar-alt"></i> Crear</button>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Estudiante -->
    <div class="modal fade" id="modalEstudiante" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear un Estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" id="txtEstudiante" name="txtEstudiante" placeholder="Nombre del Estudiante">
                    <select class="form-control mb-3" id="txtFicha" name="txtFicha">
                        <option>Seleccione una Ficha</option>
                    </select>
                    <button class="btn btn-purple"><i class="fas fa-calendar-alt"></i> Crear</button>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ambiente -->
    <div class="modal fade" id="modalAmbiente" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear un Ambiente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" id="txtAmbiente" name="txtAmbiente" placeholder="Nombre del Ambiente">
                    <select class="form-control mb-3" id="txtRegional" name="txtRegional">
                        <option>Seleccione una Regional</option>
                    </select>
                    <button class="btn btn-purple"><i class="fas fa-calendar-alt"></i> Crear</button>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Clase -->
    <div class="modal fade" id="modalClase" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear una Clase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <select class="form-control mb-3" id="txtInstructor" name="txtInstructor">
                        <option>Seleccione un Instructor</option>
                    </select>
                    <input type="date" class="form-control mb-3" id="txtFecha" name="txtFecha" placeholder="Fecha">
                    <select class="form-control mb-3" id="txtAmbiente" name="txtAmbiente">
                        <option>Seleccione un Ambiente</option>
                    </select>
                    <button class="btn btn-purple"><i class="fas fa-calendar-alt"></i> Crear</button>
                  
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script adicional para asegurar que los modales funcionen -->
    <script>
        // Asegurarse de que los modales se inician correctamente
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar que Bootstrap está cargado correctamente
            if (typeof bootstrap !== 'undefined') {
                console.log('Bootstrap cargado correctamente');
                
                // Inicializar todos los modales manualmente si es necesario
                var modalElements = document.querySelectorAll('.modal');
                modalElements.forEach(function(modalElement) {
                    var modal = new bootstrap.Modal(modalElement);
                });
            } else {
                console.error('Bootstrap no se ha cargado correctamente');
            }
        });
    </script>
</body>
</html>