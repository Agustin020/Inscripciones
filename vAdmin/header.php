<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .header {
            margin-left: 250px;
            transition: 0.2s all;
        }

        .header .settingsUser a:hover {
            background-color: darkviolet;
        }

        #buttonText {
            display: flex;
            align-items: center;
        }

        #buttonText span {
            padding: 15px;
        }

        #buttonText button {
            color: white;
            border-radius: 5px;
            transition: 0.1s all;
            background-color: transparent;
            border: none;
        }

        #buttonText button:active {
            box-shadow: 0 0 0 2px gray;
        }

        .sidebar {
            width: 250px;
            height: 100%;
            color: white;
            transition: 0.2s all;
        }

        .sidebar #txtRol {
            padding: 15px;
        }

        .sidebar a {
            padding-left: 20px;
            padding-right: 20px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar a:hover {
            background-color: blueviolet;
        }

        .sidebar a:active {
            box-shadow: 0 0 5px 0 darkviolet;
        }


        .sidebar #menu a {
            border-left: 5px solid darkviolet;
        }

        .sidebar i {
            color: white;
        }

        section {
            margin-left: 250px;
            margin-top: 56px;
            transition: 0.2s all;
        }

        .hideSidebar {
            transition: 0.2s all;
            left: -250px;
        }

        .expandHeader {
            transition: 0.2s all;
            margin-left: 0;
        }

        .expandContainer {
            margin-left: 0;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#iconToggle').click(function() {
                $('#navHeader').toggleClass('expandHeader');
                $('#navSidebar').toggleClass('hideSidebar');
                $('#container').toggleClass('expandContainer');
                //$('.sidebar').hide(200);
            });

            $('#menu').hide();
            $('#showMenu').click(function() {
                $('#menu').toggle(100);
                $('#showMenu i').toggleClass('bi bi-caret-up');
            })


            $('#btnEditar').click(function() {
                $('.bodyModal').find('input, select').removeAttr('readonly');
                $('.seccionEditar').hide(200);
                $('.seccionGuardar').show(200);
            })

            $('#btnCancelar').click(function() {
                $('.bodyModal').find('input, select').prop('readonly', true);
                $('.seccionEditar').show(200);
                $('.seccionGuardar').hide(200);
                $('#btnCambiarPass').show(200);
                //Check
                $('.mostrarPass').prop('checked', false);
                $('#cambiarPass').find('input[type=text]').prop('type', 'password');
                $('#cambiarPass').hide().find('input').prop('required', false);
                $('#cambiarPass').hide().find('input').val('');
            })

            $('#btnCambiarPass').click(function() {
                $('#cambiarPass').show().find('input').prop('required', true);
                $('#cambiarPass').show().find('input').removeAttr('readonly');
                $('#btnCambiarPass').hide(200);
                $('.seccionEditar').hide(200);
                $('.seccionGuardar').show(200);
            })
        })
    </script>

    <script>
        function verificarPassIguales(valor) {
            var passRepetida = valor.value;
            var passNueva = $('#passNueva').val();

            if (passNueva != passRepetida) {
                document.getElementById('passRepetida').setCustomValidity('Las contraseñas deben ser iguales');
            } else {
                document.getElementById('passRepetida').setCustomValidity('');
            }
        }

        function mostrarPass(valor) {
            var check = valor.checked;
            if (check) {
                $('#passNueva').prop('type', 'text');
                $('#passRepetida').prop('type', 'text');
            } else {
                $('#passNueva').prop('type', 'password');
                $('#passRepetida').prop('type', 'password');
            }
        }
    </script>
</head>

<body>
    <nav id="navHeader" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top header">
        <div class="container-fluid">
            <div id="buttonText">
                <button id="iconToggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand fw-bold" style="margin-left: 5px;">Gestión</a>
            </div>

            <ul class="navbar-nav settingsUser">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username']['datosUser']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Gestionar usuario actual</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../controlador/c_logout.php">Cerrar sesión</a></li>
                    </ul>

                </li>
            </ul>
        </div>
    </nav>

    <!--Datos del usuario-->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos personales de <?php echo $_SESSION['username']['datosUser']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../controlador/c_modificarDatosPersonales.php" method="post">
                    <div class="modal-body bodyModal">

                        <p class="fs-6">Puede modificar sus datos si lo desea</p>

                        <input type="hidden" name="dni" value="<?php echo $_SESSION['dni']; ?>">

                        <?php
                        require_once('../modelo/m_consultas.php');
                        $co = new Consultas();

                        $datosUsuario = $co->listarInfoUsuario($_SESSION['dni']);
                        $departamentos = $co->listarDepartamentos();
                        foreach ($datosUsuario as $dato) {
                        ?>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nombre" value="<?php echo $dato[1]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Nombre</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="apellido" value="<?php echo $dato[2]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Apellido</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="domicilio" value="<?php echo $dato[3]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Domicilio</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="codPostalDep" aria-label="Floating label select example" readonly>
                                    <option value="<?php echo $dato[4]; ?>" selected><?php echo $dato[5]; ?> (Actual)</option>

                                    <?php
                                    foreach ($departamentos as $departamento) {

                                    ?>
                                        <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                                <label for="floatingSelect">Departamento</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="cPostal" value="<?php echo $dato[6]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Código Postal</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="lugarNac" value="<?php echo $dato[7]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Lugar de Nacimiento</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="fechaNac" value="<?php echo $dato[8]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Fecha de Nacimiento</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" name="cel" value="<?php echo $dato[9]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Celular</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="correo" value="<?php echo $dato[10]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Correo</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" value="<?php echo $dato[11]; ?>" id="floatingInput" placeholder="example" readonly>
                                <label for="floatingInput">Nombre de Usuario</label>
                            </div>

                        <?php
                        }
                        ?>

                        <button type="button" id="btnCambiarPass" class="btn btn-warning mb-3">Cambiar Contraseña</button>

                        <div id="cambiarPass" style="display: none;">
                            <hr>
                            <p class="fs-6">Ingrese los campos</p>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="passNueva" placeholder="example">
                                <label for="floatingInput">Contraseña</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" onkeyup="verificarPassIguales(this);" name="pass" id="passRepetida" placeholder="example">
                                <label for="floatingInput">Repetir Contraseña</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input mostrarPass" type="checkbox" value="" id="flexCheckDefault" onclick="mostrarPass(this);">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Mostrar contraseña
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer seccionEditar">
                        <button type="button" id="btnEditar" class="btn btn-warning">Editar</button>
                    </div>
                    <div class="modal-footer seccionGuardar" style="display: none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" id="btnCancelar">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <nav id="navSidebar" class="navbar-dark bg-dark fixed-top sidebar" style="display: flex; flex-direction: column; justify-content: space-between;">

        <div id="sidebarSuperior">
            <div id="txtRol">
                <?php
                if ($_SESSION['rol'] == 2) {
                ?>
                    <p class="fs-5" style="margin-bottom: 0 !important;">Preceptor</p>
                <?php
                } else if ($_SESSION['rol'] == 3) {
                ?>
                    <p class="fs-5" style="margin-bottom: 0 !important;">Admin</p>
                <?php
                }
                ?>
            </div>

            <ul class="navbar-nav bg-dark">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="gestion.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?accion=listarBajas">Listado de bajas</a>
                </li>
                
            </ul>
        </div>

        <?php
        require_once('../modelo/m_consultas.php');
        $co = new Consultas();
        $fechaActual = $co->fechaActual();

        $date = date_create($fechaActual);
        $fechaActualFormat = date_format($date, 'd/m/Y');
        ?>

        <div id="sidebarInferior">
            <p class="fs-6 text-center fw-bold"><?php echo $fechaActualFormat; ?></p>
        </div>
    </nav>

</body>

</html>