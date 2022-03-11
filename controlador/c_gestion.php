<?php

class ControladorGestion
{

    public function listarRegistros()
    {
        require('modelo/m_consultas.php');
        $co = new Consultas();
        $lista = $co->listarRegistros();
        require('vistas/lib/libreria.php');
        require('vistas/pagesGestion/header.php');
        require('vistas/pagesGestion/listarRegistro.php');
    }

    public function listarEstudiantes1ro()
    {
        require('modelo/m_consultas.php');
        $co = new Consultas();
        $anio = 1;
        $lista1ro = $co->listarEstudiantes1ro();
        $listCarrera = $co->listarCarrera();
        require('vistas/lib/libreria.php');
        require('vistas/pagesGestion/header.php');
        require('vistas/pagesGestion/listarEstudiantes1ro.php');
    }



    public function registrarEstudiante()
    {
        require('modelo/m_consultas.php');
        $co = new Consultas();
        $listEstudiantesNA = $co->listarEstudiantesNoAsignados();
        $listCarrera = $co->listarCarrera();
        require('vistas/lib/libreria.php');
        require('vistas/pagesGestion/header.php');
        require('vistas/pagesGestion/registrarEstudiante.php');
    }
}
