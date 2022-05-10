<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .contenedor {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            background-color: darkblue;
        }

        form {
            margin-left: 20px;
        }

        form>* {
            margin: 10px 30px;
        }

        form h4,
        span {
            color: white;
        }

        form .btnGroup{
            display: flex;
            justify-content: space-between;
        }

        form .btnGroup a{
            text-decoration: none;
            color: white;
        }

    </style>

</head>

<body>
    <div class="contenedor">
        <form action="controlador/c_login.php" method="post" class="border border-primary">
            <img src="http://ies9008.mendoza.edu.ar/pluginfile.php/1/core_admin/logo/0x200/1630026381/190x298.jpg" alt="">
            <hr>
            <?php
            error_reporting(0);
            $errorLogin = $_GET['error'];

            if ($errorLogin == 'autenticacion') {
            ?>
                <div class="alert alert-primary" role="alert" id="msjError">
                    Datos Erronéos.
                    <br>
                    Ingrese nuevamente
                </div>
            <?php
            }
            ?>

            <h4>Iniciar Sesión</h4>
            <div class="form-floating">
                <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                <label for="floatingInput">Usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña">
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="btnGroup">
                <button type="button" name="submit" class="btn btn-primary"><a href="Registro.php">Registrarse</a></button>

                <button type="submit" name="submit" class="btn btn-primary">Acceder</button>
            </div>
        </form>
    </div>
</body>

</html>