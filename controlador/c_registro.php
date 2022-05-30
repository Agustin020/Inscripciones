<?php

require('../modelo/m_consultas.php');
$co = new Consultas();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$celular = $_POST['cel'];
$username = $_POST['username'];
$password = $_POST['password'];

/*echo 'nombre: ' . $nombre . '<br>' .
'apellido: ' . $apellido . '<br>' .
'email: ' . $email . '<br>' .
'dni: ' . $dni . '<br>' .
'celular: ' . $celular . '<br>' .
'username: ' . $username . '<br>' .
'password: ' . $password;*/

if ($co->registrarUsuario($dni, $nombre, $apellido, $email, $celular, $username, $password)) {
    session_start();
    $_SESSION['registro'] = true;
    header('Location: ../login.php');
    echo 'Verdadero';
} else {
    echo 'Hubo un error';
}
