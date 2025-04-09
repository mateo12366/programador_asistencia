<?php

require_once '../app/config/global.php';
require_once '../app/controller/homeController.php';

require_once '../app/controller/claseController.php';
require_once '../app/controller/coordinadorController.php';
require_once '../app/controller/instructorController.php';
require_once '../app/controller/superAdminController.php';




$url = $_SERVER["REQUEST_URI"];
$routeslist = require_once '../app/config/routes.php';

$matchedRoute = null;
foreach ($routeslist as $route => $routeConfig) {
    if(preg_match("#^$route$#", $url, $matches)){
        $matchedRoute = $routeConfig;
        break;
    }
}


if($matchedRoute){
    $controllerName = $matchedRoute['controller'];
    $actionName = $matchedRoute['action'];
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        $parameters = array_slice($matches, 1);
        $controller = new $controllerName();
        $controller->$actionName(...$parameters);
        exit;
    }else{
        http_response_code(404);
        echo 'La accion y/o controlador no existe en la aplicacion';
    }
}else{
    http_response_code(404);
    echo'Error 404 la pagina solicitada no existe';
}

?>