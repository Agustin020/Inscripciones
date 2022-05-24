<?php

require('../../modelo/m_conexionPage.php');
$link = conexion();

$codCarrera = $_POST['carrera'];

$sql = "SELECT * FROM sede WHERE codigo IN (SELECT codigoSede FROM sede_carrera WHERE codigoCarrera3 
        IN (SELECT codigo FROM carrera WHERE codigo = '$codCarrera'))";

$result = mysqli_query($link, $sql);

if ($codCarrera == '') {
    $html = '<option value="">Primero debe seleccionar la carrera</option>';
} else {

    $html = '<option value="">Seleccione la sede</option>';
    while ($row = mysqli_fetch_row($result)) {
        $html .= '<option value="' . $row[0] . '">' . $row[1] . '</option>';
    }
}
echo $html;
