<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/visualizar_horario/reset.css">
    <link rel="stylesheet" href="/css/visualizar_horario/visualizar_horario.css">
    <title>Visualizar Horario</title>
    <style>
        /* Estilos adicionales para el formulario de clase */
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
    </style>
</head>

<body>
    <header>
        <h1>Visualizar Horario</h1>
        <a href="">Cerrar Sesion</a>
    </header>
    
    <?php include_once $content; ?>
    
</body>

</html>