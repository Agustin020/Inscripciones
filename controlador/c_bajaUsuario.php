<?php

require('../modelo/m_consultas.php');
$co = new Consultas();

$motivoBaja = $_POST['motivoBaja'];
$anio = $_POST['anio'];
$sede = $_POST['sede'];
$dni = $_POST['dni'];

if ($co->bajaUsuario($motivoBaja, $dni)) {
    session_start();
    $_SESSION['bajaOk'] = true;
    header('Location: ../vAdmin/index.php?accion=listarEstudiantes&anio&anio=' . $anio . '&sede=' . $sede);
}
