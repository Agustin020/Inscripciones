<?php

require('../modelo/m_consultas.php');
$co = new Consultas();

$dni = $_POST['dni'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$fechaNac = $_POST['fechaNac'];
$lugarNac = $_POST['lugarNac'];
$domicilio = $_POST['domicilio'];
$codPostal = $_POST['codPostal'];
$celular = $_POST['cel'];
$correo = $_POST['correo'];
$codCarrera = $_POST['selectCarreras'];
$codSede = $_POST['selectSede'];
$anioCursado = $_POST['anioCursado'];
$materias = $_POST['materias'];

$materiasInscriptas = '';
foreach ($materias as $materia) {
    $materiasInscriptas .= $materia . ', ';
}
if ($co->agregarInscripcion($dni, $apellido, $nombre, $fechaNac, $lugarNac, $domicilio, $codPostal, $celular, $correo, $materiasInscriptas, $codCarrera, $codSede, $anioCursado)) {
    echo 'Verdadero';
}else{
    echo 'Falso';
}




/*echo 'Dni: ' . $dni . '<br>' .
'Apellido: ' . $apellido . '<br>' .
'Nombre: ' . $nombre . '<br>' .
'Fecha Nacimiento: ' . $fechaNac . '<br>' .
'Lugar Nacimiento: ' . $lugarNac . '<br>' .
'Domicilio: ' . $domicilio . '<br>' .
'Codigo Postal: ' . $codPostal . '<br>' .
'Celular: ' . $celular . '<br>' .
'Correo: ' . $correo . '<br>' .
'Codigo Carrera: ' . $codCarrera . '<br>' .
'Codigo Sede: ' . $codSede . '<br>' .
'Año Cursado: ' . $anioCursado . '<br>' . 
'Materias: ' . $materiasInscriptas;*/

