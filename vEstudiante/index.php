<?php
session_start();
error_reporting(0);
$accion = $_GET['accion'];

switch ($accion) {
    case 'inscripcion':
        require('../controlador/c_estudiante.php');
        $controlador = new ControladorVistasEstudiantes();
        $controlador->pageInscripcion();
        break;

    case 'verCalificaciones':
        require('../controlador/c_estudiante.php');
        $controlador = new ControladorVistasEstudiantes();
        $controlador->verCalificacionesContr($_SESSION['dni']);
        break;

    case 'verHistorialAcademico':
        require('../controlador/c_estudiante.php');
        $controlador = new ControladorVistasEstudiantes();
        $controlador->verHistorialAcademicoContr($_SESSION['dni']);
        break;
}
