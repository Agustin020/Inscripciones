<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a3c1a16320.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="LogEstile.css">
    <script defer src="LogJavaScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <!--SweetAlert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Login y Registro</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <?php
            error_reporting(0);
    
            $registroGet = $_GET['registro'];
            if ($registroGet == 'ok') {
                session_start();
                if (isset($_SESSION['registro']) && $_SESSION['registro'] === true) {
            ?>
            <script>
                $(document).ready(function () {
                    Swal.fire(
                        'Tus datos han sido enviados!',
                        'A la brevedad te confirmaremos el acceso al Sistema',
                        'success'
                    )
                });
            </script>
            <?php
                    unset($_SESSION['registro']);
                } else {
                ?>
            <script>
                $(document).ready(function () {
                    Swal.fire({
                        title: 'Advertencia',
                        text: 'Debe llenar los datos del registro',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(location).prop('href', 'Login-y-Registro-Prototipo.php');
                        }
                    });
                });
            </script>
            <?php
                }
            }
            ?>
            <form action="../controlador/c_registro.php" id="form" method="post">
                <h1>Registro</h1>
                <span> <b>Nota:</b> Los datos enviados se evaluaran de acuerdo a la documentación presentada.
                    De acuerdo a lo enviado se le dara de alta al Sistema si es que corresponde.
                </span>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                <div id="mensaje1" class="errores">Introducí un nombre válido</div>
                
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
                <div id="mensaje2" class="errores">Introducí un apellido válido</div>

                <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico">
                <div id="mensaje3" class="errores">Introducí un email válido</div>

                <input type="number" class="form-control" name="dni" id="dni" placeholder="Dni" min="1000000"
                    max="99999999">
                <div id="mensaje4" class="errores">El DNI no puede estar vacío</div>

                <input type="tel" class="form-control" name="cel" id="cel" placeholder="Celular">
                <div id="mensaje5" class="errores">Introducí un teléfono válido</div>

                <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio">
                <div id="mensaje6" class="errores">El domicilio no puede estar vacío</div>

                <input type="date" class="form-control" name="fechaNac" id="fechaNac" placeholder="Fecha de Nacimiento">
                <div id="mensaje7" class="errores">La fecha de nacimiento estar vacía</div>

                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
                <div id="mensaje8" class="errores">Introducí un nombre de usuario válido</div>

                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                <div id="mensaje9" class="errores">Introducí una contraseña válida</div>

                <div id="btnEnviar">
                    <button type="submit" id="enviar">Registrarme</button>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <i class="fa-solid fa-users fa-10x"></i>
                <h1>Iniciar Sesión</h1>
                <span>Bienvenido al Sistema</span>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Contraseña">
                <button>Iniciar Sesión</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <i class="fa-solid fa-user fa-10x"></i>
                    <p>Si tenés una cuenta podés iniciar sesión</p>
                    <button class="ghost" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <i class="fas fa-user icon fa-10x"></i>
                    <p>Si no tenés una cuenta podés registrarte</p>
                    <button class="ghost" id="signUp">Registrarme</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>