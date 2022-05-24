<?php
class ControladorVistasEstudiantes
{


    public function pageInscripcion()
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listCarreras = $co->listarCarrera();
        $listSedes = $co->listarSedes();
        $listAnios = $co->listarAnioCursado();
        require('header.php');
        require('libreria.php');
        require('inscripcion.php');
    }
}
