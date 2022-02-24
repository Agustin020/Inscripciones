<?php
require('../modelo/m_consultas.php');

$usuario = $_POST['user'];
$password = $_POST['pass'];

$co = new Consultas();

if ($co->autenticar($usuario, $password)) {
    switch ($co->verificarTipoUser($usuario)) {
        case 1:
            session_start();
            $listaNomApell = $co->mostrarNombreApellido($usuario);
            $datosSessionArray = array(
                'usuario' => $usuario,
                'rol' => $co->verificarTipoUser($usuario),
                'datosUser' => $listaNomApell,
            );
            $_SESSION['username'] = $datosSessionArray;
            $_SESSION['timeout'] = time();
            
            break;
        case 2:
        case 3:
            session_start();
            $listaNomApell = $co->mostrarNombreApellido($usuario);
            $datosSessionArray = array(
                'usuario' => $usuario,
                'rol' => $co->verificarTipoUser($usuario),
                'datosUser' => $listaNomApell,
            );
            $_SESSION['username'] = $datosSessionArray;
            break;
    }
} else {
    header('Location: ../vistas/login.php?error=autenticacion');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button type="button"><a href="LogoutControlador.php">Cerrar sesion</a></button>
</body>

</html>