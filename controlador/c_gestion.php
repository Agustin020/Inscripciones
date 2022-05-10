<?php

class ControladorGestion
{

    public function pageAgregarUsuarioContr(){
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listRoles = $co->listarTipoUsuarios();
        $listCarreras = $co->listarCarrera();
        $listSedes = $co->listarSedes();
        $listAnios = $co->listarAnioCursado();
        require('libreria.php');
        require('header.php');
        require('agregarUsuario.php');
    }

    public function listarEstudiantesContr($anioCursado)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listaEstudiantes = $co->listarEstudiantes($anioCursado);
        $listCarrera = $co->listarCarrera();
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
