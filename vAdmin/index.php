<?php
session_start();
$accion = $_GET['accion'];

switch ($accion) {
    case 'agregarUsuario':
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->pageAgregarUsuarioContr();
        break;
    case 'listarEstudiantes':
        $anioCursado = $_GET['anio'];
        $codSede = $_GET['sede'];
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->listarEstudiantesContr($anioCursado, $codSede);
        break;
    case 'infoEstudiante':
        $dni = $_GET['dni'];
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->infoEstudianteContr($dni);
        break;
}
