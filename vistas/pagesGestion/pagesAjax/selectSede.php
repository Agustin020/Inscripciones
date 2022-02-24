<?php

$link = mysqli_connect('localhost', 'root', '', 'inscripciones2.0');
$codCarrera = $_POST["carrera"];

$sql = "SELECT * FROM sede WHERE codigo IN (SELECT codigoSede FROM sede_carrera WHERE codigoCarrera3 
        IN (SELECT codigo FROM carrera WHERE codigo = '$codCarrera'))";
$result = mysqli_query($link, $sql);

$cadena = '<option value="">Seleccione la sede</option>';
while ($res = mysqli_fetch_row($result)) {
    $cadena = $cadena . '<option value=' . $res[0] . '>' . $res[1] . '</option>';
}

echo $cadena;
