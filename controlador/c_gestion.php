<?php

class ControladorGestion
{

    public function pageAgregarUsuarioContr(){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listRoles = $co->listarTipoUsuarios();
        $listDepartamentos = $co->listarDepartamentos();
        $listCarreras = $co->listarCarrera();
        $listSedes = $co->listarSedes();
        $listAnios = $co->listarAnioCursado();
        require('libreria.php');
        require('header.php');
        require('agregarUsuario.php');
    }

    public function listarEstudiantesContr($anioCursado, $codSede)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listSedesPreceptor = $co->verificarCarrerasSedePreceptor($_SESSION['username']['usuario']);
        $listaEstudiantes = $co->listarEstudiantes($anioCursado, $codSede);
        $listCarrera = $co->listarCarrera();
        $anio = $anioCursado;
        $codigoSede = $codSede;
        require('libreria.php');
        require('header.php');
        require('listarEstudiantes.php');
    }

    public function infoEstudianteContr($dni){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $infoEstudiante = $co->informacionEstudiante($dni);
        $departamentoUsuario = $co->listarDepartamentoUsuario($dni);
        $listDepartamentos = $co->listarDepartamentos();
        $anioCursadoEstudiante = $co->listarAnioCursadoEstudiante($dni);
        $aniosCursado = $co->listarAnioCursado();
        $listCarreraEstudiante = $co->listarCarreraEstudiante($dni);
        $listCarreras = $co->verificarCarrerasSedePreceptor($_SESSION['username']['usuario']);
        $listMateriasEstudiante = $co->listarMateriasEstudiantes($dni);
        require('libreria.php');
        require('header.php');
        require('infoEstudiantes.php');
    }

    public function verCalificacionesContr($dni){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listCalifEstudiante = $co->listarCalificacionesEstudiante($dni);
        $dniEstudiante = $dni;
        require('libreria.php');
        require('header.php');
        require('calificaciones.php');
    }

    public function listarSolicitudesAltaContr(){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listSolicitudAlta = $co->listarSolicitudAlta();
        require('libreria.php');
        require('header.php');
        require('listarRegistros.php');
    }

    public function listarInscripcionesContr($anio, $sedeActual){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listInscripcion = $co->listarInscripciones($anio, $sedeActual);
        require('libreria.php');
        require('header.php');
        require('listarInscripciones.php');
    }

}
