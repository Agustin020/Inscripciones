<?php

require('../modelo/m_consultas.php');
$co = new Consultas();

$dniInscripcion = $_POST['dniInscripcion'];

$dni = $_POST['dni'];
$codSede = $_POST['sede'];
$codCarrera = $_POST['selectCarrera'];
$anio = $_POST['selectAnio'];
$materiasMarcadas = $_POST['materias'];


$listMateriasInscriptas = $co->listarMateriasEstudiantes($dni);
$contInscriptas = 0;
foreach ($listMateriasInscriptas as $materiasInscriptas) {
    foreach ($materiasMarcadas as $materias) {
        if ($materiasInscriptas[0] == $materias) {
            $contInscriptas++;
        }
    }
}


if ($anio == 1) {
    if ($co->asignarCarreraUsuario($dni, $codCarrera)) {
        if ($co->asignarSedeUsuario($dni, $codSede)) {
            if ($contInscriptas == 0) {
                foreach ($materiasMarcadas as $materias) {
                    $co->asignarCalificacionesEstudiante($dni, $materias);
                }
                if ($co->asignarAnioEstudiante($dni, $anio)) {
                    session_start();
                    $_SESSION['estudianteInscripto'] = true;
                    header('Location: ../vAdmin/index.php?accion=inscribirEstudiante&dni=' . $dniInscripcion . '');
                }
            } else {
                session_start();
                $_SESSION['errorMateriasInscriptas'] = true;
                header('Location: ../vAdmin/index.php?accion=inscribirEstudiante&dni=' . $dniInscripcion . '');
            }
        }
    }
} else {
    if ($co->asignarCarreraEstudiante($dni, $codCarrera)) {
        if ($co->asignarSedeEstudiante($dni, $codSede)) {
            if ($contInscriptas == 0) {
                foreach ($materiasMarcadas as $materias) {
                    $co->asignarCalificacionesEstudiante($dni, $materias);
                }
                if ($co->asignarAnioEstudiante($dni, $anio)) {
                    session_start();
                    $_SESSION['estudianteInscripto'] = true;
                    header('Location: ../vAdmin/index.php?accion=inscribirEstudiante&dni=' . $dniInscripcion . '');
                }
            } else {
                session_start();
                $_SESSION['errorMateriasInscriptas'] = true;
                header('Location: ../vAdmin/index.php?accion=inscribirEstudiante&dni=' . $dniInscripcion . '');
            }
        }
    }
}

/*if ($co->asignarCarreraUsuario($dni, $codCarrera)) {
    if ($co->asignarSedeUsuario($dni, $codSede)) {
        
        
        if (isset($materias)) {
            foreach ($materiasMarcadas as $materia) {
                if ($co->asignarCalificacionesEstudiante($dni, $materia)) {
                    
                }
            }
        }

        
    }
}*/