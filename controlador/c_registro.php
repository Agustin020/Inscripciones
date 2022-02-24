<?php

require('../modelo/m_consultas.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$celular = $_POST['cel'];
$domicilio = $_POST['domicilio'];
$fechaNac = $_POST['fechaNac'];
$username = $_POST['username'];
$password = $_POST['password'];

$co = new Consultas();

if ($co->registrarUsuario($username, $nombre, $apellido, $password, $fechaNac, $dni, $domicilio, $celular, $email)) {
    session_start();
    $_SESSION['registro'] = true;
    header('Location: ../vistas/registro.php?registro=ok');
} else {
    echo 'Hubo un error';
}
