<?php
require('../modelo/m_consultas.php');
$co = new Consultas();

$contador = 0;

$rol = $_POST['rolUser'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$domicilio = $_POST['domicilio'];
$departamento = $_POST['departamento'];
$codPostal = $_POST['codPostal'];
$lugarNac = $_POST['lugarNac'];
$fechaNac = $_POST['fechaNac'];
$celular = $_POST['cel'];
$codCarrera = $_POST['selectCarreras'];
$codSede = $_POST['selectSede'];
$anioCursado = $_POST['anioCursado'];

$materias = $_POST['materias'];

/*$asignarEstudiante = $co->asignarEstudiante($dni, $anioCursado);
$asignarCarreraUsuario = $co->asignarCarreraUsuario($dni, $codCarrera);
$asignarSedeUsuario = $co->asignarSedeUsuario($dni, $codSede);
$asignarCalificaciones = $co->asignarCalificacionesEstudiante($dni, $codMateria);*/

switch ($rol) {
    case 1:
        $agregarUsuarioEstudiante = $co->agregarUsuario($dni, $nombre, $apellido, $correo, $usuario, $pass, $domicilio, $codPostal, $departamento, $lugarNac, $fechaNac, $celular, 1);
        if ($agregarUsuarioEstudiante) {
            if ($co->asignarEstudiante($dni, $anioCursado)) {
                if ($co->asignarCarreraUsuario($dni, $codCarrera)) {
                    if ($co->asignarSedeUsuario($dni, $codSede)) {
                        if (isset($materias)) {
                            foreach ($materias as $materia) {
                                $co->asignarCalificacionesEstudiante($dni, $materia);
                            }
                        }
                    }
                }
            }
        } else {
            $contador = 0;
        }
        echo $contador;
        break;
    case 2:
        $agregarUsuarioPreceptor = $co->agregarUsuario($dni, $nombre, $apellido, $correo, $usuario, $pass, $domicilio, $codPostal, $departamento, $lugarNac, $fechaNac, $celular, 2);
        if($agregarUsuarioPreceptor){
            if($co->asignarSedeUsuario($dni, $codSede)){

            }
        }
        break;
    case 3:
        $agregarUsuarioAdmin = $co->agregarUsuario($dni, $nombre, $apellido, $correo, $usuario, $pass, $domicilio, $codPostal, $departamento, $lugarNac, $fechaNac, $celular, 3);
        if($agregarUsuarioAdmin){
            
        }
}
