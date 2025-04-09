<?php
return [
    '/' => [
        'controller'=> 'App\Controller\HomeController',
        'action'=> 'index',
    ],
    '/home'=> [
        'controller'=> 'App\Controller\HomeController',
        'action'=> 'index',
    ],
    
    // Rutas para Regionales
    '/regionales/init' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'initRegionales'],
    '/regionales/new' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'new'],
    '/regionales/create' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'create'],
    '/regionales/view/(\d+)' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'view'],
    '/regionales/edit/(\d+)' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'editRegionales'],
    '/regionales/update/(\d+)' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'updateRegionales'],
    '/regionales/delete/(\d+)' => ['controller' => 'App\Controller\RegionalesController', 'action' => 'deleteRegionales'],

    // Rutas para Centros
    '/centros/init' => ['controller' => 'App\Controller\CentrosController', 'action' => 'initCentros'],
    '/centros/new' => ['controller' => 'App\Controller\CentrosController', 'action' => 'new'],
    '/centros/create' => ['controller' => 'App\Controller\CentrosController', 'action' => 'create'],
    '/centros/view/(\d+)' => ['controller' => 'App\Controller\CentrosController', 'action' => 'view'],
    '/centros/edit/(\d+)' => ['controller' => 'App\Controller\CentrosController', 'action' => 'editCentros'],
    '/centros/update/(\d+)' => ['controller' => 'App\Controller\CentrosController', 'action' => 'updateCentros'],
    '/centros/delete/(\d+)' => ['controller' => 'App\Controller\CentrosController', 'action' => 'deleteCentros'],

    // Rutas para Ambientes
    '/ambientes/init' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'initAmbientes'],
    '/ambientes/new' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'new'],
    '/ambientes/create' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'create'],
    '/ambientes/view/(\d+)' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'view'],
    '/ambientes/edit/(\d+)' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'editAmbientes'],
    '/ambientes/update/(\d+)' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'updateAmbientes'],
    '/ambientes/delete/(\d+)' => ['controller' => 'App\Controller\AmbientesController', 'action' => 'deleteAmbientes'],

    // Rutas para ProgramaFormacion
    '/programaFormacion/init' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'initProgramaFormacion'],
    '/programaFormacion/new' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'new'],
    '/programaFormacion/create' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'create'],
    '/programaFormacion/view/(\d+)' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'view'],
    '/programaFormacion/edit/(\d+)' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'editProgramaFormacion'],
    '/programaFormacion/update/(\d+)' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'updateProgramaFormacion'],
    '/programaFormacion/delete/(\d+)' => ['controller' => 'App\Controller\ProgramaFormacionController', 'action' => 'deleteProgramaFormacion'],

    // Rutas para Fichas
    '/fichas/init' => ['controller' => 'App\Controller\FichasController', 'action' => 'initFichas'],
    '/fichas/new' => ['controller' => 'App\Controller\FichasController', 'action' => 'new'],
    '/fichas/create' => ['controller' => 'App\Controller\FichasController', 'action' => 'create'],
    '/fichas/view/(\d+)' => ['controller' => 'App\Controller\FichasController', 'action' => 'view'],
    '/fichas/edit/(\d+)' => ['controller' => 'App\Controller\FichasController', 'action' => 'editFichas'],
    '/fichas/update/(\d+)' => ['controller' => 'App\Controller\FichasController', 'action' => 'updateFichas'],
    '/fichas/delete/(\d+)' => ['controller' => 'App\Controller\FichasController', 'action' => 'deleteFichas'],

    // Rutas para Clases
    '/clases/init' => ['controller' => 'App\Controller\ClasesController', 'action' => 'initClases'],
    '/clases/new' => ['controller' => 'App\Controller\ClasesController', 'action' => 'new'],
    '/clases/create' => ['controller' => 'App\Controller\ClasesController', 'action' => 'create'],
    '/clases/view/(\d+)' => ['controller' => 'App\Controller\ClasesController', 'action' => 'view'],
    '/clases/edit/(\d+)' => ['controller' => 'App\Controller\ClasesController', 'action' => 'editClases'],
    '/clases/update/(\d+)' => ['controller' => 'App\Controller\ClasesController', 'action' => 'updateClases'],
    '/clases/delete/(\d+)' => ['controller' => 'App\Controller\ClasesController', 'action' => 'deleteClases'],

    // Rutas para Roles
    '/roles/init' => ['controller' => 'App\Controller\RolesController', 'action' => 'initRoles'],
    '/roles/new' => ['controller' => 'App\Controller\RolesController', 'action' => 'new'],
    '/roles/create' => ['controller' => 'App\Controller\RolesController', 'action' => 'create'],
    '/roles/view/(\d+)' => ['controller' => 'App\Controller\RolesController', 'action' => 'view'],
    '/roles/edit/(\d+)' => ['controller' => 'App\Controller\RolesController', 'action' => 'editRoles'],
    '/roles/update/(\d+)' => ['controller' => 'App\Controller\RolesController', 'action' => 'updateRoles'],
    '/roles/delete/(\d+)' => ['controller' => 'App\Controller\RolesController', 'action' => 'deleteRoles'],

    // Rutas para Asistencias
    '/asistencias/init' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'initAsistencias'],
    '/asistencias/new' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'new'],
    '/asistencias/create' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'create'],
    '/asistencias/view/(\d+)' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'view'],
    '/asistencias/edit/(\d+)' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'editAsistencias'],
    '/asistencias/update/(\d+)' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'updateAsistencias'],
    '/asistencias/delete/(\d+)' => ['controller' => 'App\Controller\AsistenciasController', 'action' => 'deleteAsistencias'],

    // Rutas para Usuarios
    '/usuarios/init' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'initUsuarios'],
    '/usuarios/new' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'new'],
    '/usuarios/create' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'create'],
    '/usuarios/view/(\d+)' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'view'],
    '/usuarios/edit/(\d+)' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'editUsuarios'],
    '/usuarios/update/(\d+)' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'updateUsuarios'],
    '/usuarios/delete/(\d+)' => ['controller' => 'App\Controller\UsuariosController', 'action' => 'deleteUsuarios'],

    // Ruta login
    '/login' => ['controller' => 'App\Controller\LoginController', 'action' => 'login'],

    // Ruta Registro
    '/register' => ['controller' => 'App\Controller\RegisterController', 'action' => 'register'],

    '/superAdmin/init' => ['controller' => 'App\Controller\RolesController', 'action' => 'initSuperAdmin'],

];
?>
