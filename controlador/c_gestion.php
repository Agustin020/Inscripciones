<?php

class ControladorGestion
{

    public function listarBajasContr()
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listBajas = $co->listarBajas();
        require('libreria.php');
        require('header.php');
        require('listarBajas.php');
    }

    public function pageAgregarUsuarioContr()
    {
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

    public function infoEstudianteContr($dni)
    {
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

    public function verCalificacionesContr($dni)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listCalifEstudiante = $co->listarCalificacionesEstudiante($dni);
        $anioCursadoEstudiante = $co->listarAnioCursadoEstudiante($dni);
        $carreraEstudiante = $co->listarCarreraEstudiante($dni);
        $estudiante = $co->mostrarNombreApellidoDni($dni);
        $dniEstudiante = $dni;
        require('libreria.php');
        require('header.php');
        require('calificaciones.php');
    }

    public function verHistorialAcademicoContr($dni)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $estudiante = $co->mostrarNombreApellidoDni($dni);
        $historial = $co->listarHistorialAcademico($dni);
        require('libreria.php');
        require('header.php');
        require('historialAcademico.php');
    }

    public function listarSolicitudesAltaContr()
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listSolicitudAlta = $co->listarSolicitudAlta();
        require('libreria.php');
        require('header.php');
        require('listarRegistros.php');
    }

    public function listarInscripcionesContr($anio, $sedeActual)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listInscripcion = $co->listarInscripciones($anio, $sedeActual);
        require('libreria.php');
        require('header.php');
        require('listarInscripciones.php');
    }

    public function inscribirEstudianteContr($dni)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listInscripcion = $co->listarInscripcionEstudiante($dni);
        $listAnioCursado = $co->listarAnioCursado();
        $listCarrera = $co->verificarCarrerasSedePreceptor($_SESSION['username']['usuario']);
        $listEstudiantes = $co->listarEstudiantesCargados();
        $listMateriasEstudiantes = $co->listarMateriasEstudiantes($dni);
        require('libreria.php');
        require('header.php');
        require('inscribirEstudiante.php');
    }

    //ADMIN
    public function listarEstudiantesAdminContr($anio)
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listEstudiantes = $co->listarEstudiantesAdmin($anio);
        require('libreria.php');
        require('header.php');
        require('listarEstudiantesAdmin.php');
    }

    public function listarPreceptoresContr()
    {
        require('../modelo/m_consultas.php');
        $co = new Consultas();
        $listPreceptores = $co->listarPreceptores();
        require('libreria.php');
        require('header.php');
        require('listarPreceptores.php');
    }
}
