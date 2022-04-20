<?php

class ControladorGestion
{

    public function pageAgregarUsuarioContr(){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listRoles = $co->listarTipoUsuarios();
        $listAnios = $co->listarAnioCursado();
        require('libreria.php');
        require('header.php');
        require('agregarUsuario.php');
    }

    public function listarEstudiantes1ro()
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $anio = 1;
        $lista1ro = $co->listarEstudiantes1ro();
        $listCarrera = $co->listarCarrera();
        require('libreria.php');
        require('header.php');
        require('listarEstudiantes1ro.php');
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
