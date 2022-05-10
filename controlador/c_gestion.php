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
        require('libreria.php');
        require('header.php');
        require('listarEstudiantes.php');
    }



    public function registrarEstudiante()
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listEstudiantesNA = $co->listarEstudiantesNoAsignados();
        $listCarrera = $co->listarCarrera();
        require('libreria.php');
        require('header.php');
        require('registrarEstudiante.php');
    }
}
