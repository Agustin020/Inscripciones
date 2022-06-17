<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('vAdmin/libreria.php'); ?>
    <title>Document</title>
    <style>
        .contenedor {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            background: linear-gradient(to right, lightskyblue, darkturquoise);
            background-color: darkturquoise;
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

        form .btnGroup {
            display: flex;
            justify-content: space-between;
        }
    </style>

    <script>
        function validarNumericos(valor) {
            var patron = /^([0-9]+)*$/;
            if (!patron.test(valor.value)) {
                valor.value = valor.value.substring(0, valor.value.length - 1);
            }
        }
    </script>

</head>

<body>
    <?php
    error_reporting(0);
    session_start();
    if ($_SESSION['registro'] == true) {
    ?>
        <script>
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: 'Los datos han sido enviados',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
        unset($_SESSION['registro']);
    }
    ?>
    <div class="contenedor">
        <form action="controlador/c_login.php" method="post" class="border border-primary">
            <img src="http://ies9008.mendoza.edu.ar/pluginfile.php/1/core_admin/logo/0x200/1630026381/190x298.jpg" alt="">
            <hr>
            <?php

            if ($_SESSION['autenticacionError']) {
            ?>
                <div class="alert alert-primary" role="alert" id="msjError">
                    Datos Erronéos.
                    <br>
                    Ingrese nuevamente
                </div>
            <?php
                unset($_SESSION['autenticacionError']);
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrarse</button>

                <button type="submit" name="submit" class="btn btn-primary">Acceder</button>
            </div>
        </form>
    </div>

    <!-- Modal Registro-->
    <div class="modal fade" id="modalRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="controlador/c_registro.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <p class="fs-6">
                            Nota: Los datos enviados se evaluaran de acuerdo a la documentación presentada.<br>
                            De acuerdo a lo enviado se le dara de alta al Sistema si es que corresponde.
                        </p>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
                            <label for="floatingInput">Apellido</label>
                        </div>

                        <?php
                        require_once('modelo/m_consultas.php');
                        $co = new Consultas();
                        $listDepartamentos = $co->listarDepartamentos();
                        ?>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="codPostalDep" aria-label="Floating label select example" readonly>
                                <option selected value="">Seleccione...</option>

                                <?php
                                foreach ($listDepartamentos as $departamento) {

                                ?>
                                    <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                            <label for="floatingSelect">Departamento donde vive</label>
                        </div>

                        <div class="form-floating mb-3" id="correo">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico">
                            <label for="floatingInput">Correo Electrónico</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" oninput="validarNumericos(this);" class="form-control" name="dni" id="dni" placeholder="Dni" min="1000000" max="99999999">
                            <label for="floatingInput">DNI</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" oninput="validarNumericos(this);" class="form-control" name="cel" id="cel" placeholder="Celular">
                            <label for="floatingInput">Celular</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
                            <label for="floatingInput">Nombre de usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                            <label for="floatingInput">Contraseña</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</body>

</html>