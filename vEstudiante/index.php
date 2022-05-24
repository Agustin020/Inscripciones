<?php
session_start();
$accion = $_GET['accion'];

switch ($accion) {
    case 'inscripcion':
        require('../controlador/c_estudiante.php');
        $controlador = new ControladorVistasEstudiantes();
        $controlador->pageInscripcion();
        break;
}
