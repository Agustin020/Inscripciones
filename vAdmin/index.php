<?php
$accion = $_GET['accion'];

switch ($accion) {
    case 'agregarUsuario':
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->pageAgregarUsuarioContr();
        break;
    case 'listarEstudiantes':
        $anioCursado = $_GET['anio'];
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->listarEstudiantesContr($anioCursado);
        break;
    case 'registrarEstudiante':
        require('../controlador/c_gestion.php');
        $controlador = new ControladorGestion();
        $controlador->registrarEstudiante();
        break;
}
