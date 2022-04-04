<?php
$accion = $_GET['accion'];

switch ($accion) {
    case 'listarRegistros':
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->listarRegistros();
        break;
    case 'listarEstudiantes1ro':
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->listarEstudiantes1ro();
        break;
    case 'registrarEstudiante':
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->registrarEstudiante();
        break;
}
