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
        require('libreria.php');
        require('header.php');
        require('inscripcion.php');
    }

    public function verCalificacionesContr($dni)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listNotas = $co->listarCalificacionesEstudiante($dni);
        require('libreria.php');
        require('header.php');
        require('calificaciones.php');
    }
}
