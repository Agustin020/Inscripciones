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
        })
    </script>
</head>

<body>
    <nav id="navHeader" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top header">
        <div class="container-fluid">
            <div id="buttonText">
                <button type="button">
                    <span id="iconToggle" class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#" style="margin-left: 5px;">Gestión</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos personales de <?php echo $_SESSION['username']['datosUser']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p class="fs-6">Puede modificar sus datos si lo desea</p>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nombre" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="apellido" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Apellido</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="domicilio" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Domicilio</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="" selected>Seleccione el departamento</option>
                            <option value="1">One</option>
                        </select>
                        <label for="floatingSelect">Departamento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="cPostal" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Código Postal</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lugarNac" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Lugar de Nacimiento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="fechaNac" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Fecha de Nacimiento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" name="cel" id="floatingInput" placeholder="example">
                        <label for="floatingInput">Celular</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <nav id="navSidebar" class="navbar-dark bg-dark fixed-top sidebar">
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
                <a class="nav-link active" aria-current="page" href="gestion.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" role="button" id="showMenu">
                    Dropdown
                    <i class="bi bi-caret-down"></i>
                </a>
                <ul class="navbar-nav bg-dark" id="menu">
                    <li><a class="nav-link" href="#">Action</a></li>
                    <li><a class="nav-link" href="#">Another action</a></li>
                    <li><a class="nav-link" href="#">Something else here</a></li>
                </ul>
            </li>
        </ul>
    </nav>

</body>

</html>