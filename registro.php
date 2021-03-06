<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--SweetAlert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
    <style>
        .contenedor {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: darkblue;
        }

        form>* {
            margin: 10px 30px;
        }

        form {
            margin-left: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        form h4 {
            grid-row: 1;
            grid-column: 1/3;
            color: white;
        }

        form p {
            grid-row: 2;
            grid-column: 1/3;
            color: white;
        }

        form #correo {
            grid-row: 4;
            grid-column: 1/3;
        }

        form #btnEnviar {
            grid-column: 2/3;
        }
    </style>
    <script>
        function confirmarEnvio() {
            event.preventDefault();
            Swal.fire({
                title: 'Enviar los datos',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form').submit();
                }
                return false;

            });
        }
    </script>
</head>

<body>
    <div class="contenedor">
        <?php
        error_reporting(0);

        $registroGet = $_GET['registro'];
        if ($registroGet == 'ok') {
            session_start();
            if (isset($_SESSION['registro']) && $_SESSION['registro'] === true) {
        ?>
                <script>
                    $(document).ready(function() {
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
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Advertencia',
                            text: 'Debe llenar los datos del registro',
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $(location).prop('href', 'registro.php');
                            }
                        });
                    });
                </script>
        <?php
            }
        }
        ?>

        <form action="../controlador/c_registro.php" id="form" method="post" class="border border-primary" onsubmit="return confirmarEnvio();">
            <h4>Registro</h4>
            <p>
                <b>Nota:</b> Los datos enviados se evaluaran de acuerdo a la documentaci??n presentada.
                <br>
                De acuerdo a lo enviado se le dara de alta al Sistema si es que corresponde.
            </p>
            <div class="form-floating">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                <label for="floatingInput">Nombre</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
                <label for="floatingInput">Apellido</label>
            </div>

            <div class="form-floating" id="correo">
                <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electr??nico">
                <label for="floatingInput">Correo Electr??nico</label>
            </div>

            <div class="form-floating">
                <input type="number" class="form-control" name="dni" id="dni" placeholder="Dni" min="1000000" max="99999999">
                <label for="floatingInput">DNI</label>
            </div>

            <div class="form-floating">
                <input type="tel" class="form-control" name="cel" id="cel" placeholder="Celular">
                <label for="floatingInput">Celular</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio">
                <label for="floatingInput">Domicilio</label>
            </div>


            <div class="form-floating">
                <input type="date" class="form-control" name="fechaNac" id="fechaNac" placeholder="Fecha de Nacimiento">
                <label for="floatingInput">Fecha de Nacimiento</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
                <label for="floatingInput">Nombre de usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Contrase??a">
                <label for="floatingInput">Contrase??a</label>
            </div>

            <div class="d-flex justify-content-end" id="btnEnviar">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>