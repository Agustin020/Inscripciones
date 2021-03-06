<?php
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style type="text/css">
                section {
                    padding: 15px;
                }

                form #tipoUsuario {
                    width: 500px;
                }

                form #estudiante,
                form #preceptor,
                form #admin {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    column-gap: 30px;
                    margin: 0 20px;
                    border: 2px solid gray;
                    padding: 20px;
                    border-radius: 10px;
                    background-color: whitesmoke;
                }

                form #estudiante p,
                form #preceptor p,
                form #admin p {
                    grid-column: 1/3;
                }

                form #estudiante #selectCarreras,
                form #preceptor #selectCarreras {
                    grid-row: 8/9;
                    width: auto;
                }

                form #estudiante #selectSedes,
                form #preceptor #selectSedes {
                    grid-row: 8/9;
                    width: 500px;
                }

                form #estudiante #anioCursado,
                form #preceptor #anioCursado {
                    grid-row: 9/10;
                    width: 500px;
                }

                form #estudiante #materias,
                form #preceptor #materias {
                    grid-column: 1/2;
                }

                form #estudiante #btnGuardar,
                form #preceptor #btnGuardar,
                form #admin #btnGuardar {
                    grid-column: 2/3;
                    grid-row: 11/12;
                    display: flex;
                    justify-content: flex-end;
                }
            </style>

            <script>
                $(document).ready(function() {
                    $('.selectTipoUsuario').val('');
                    $('#estudiante').hide();
                    $('#preceptor').hide();
                    $('#admin').hide();
                })

                function mostrarOpcionesRol(rol) {
                    var rol = rol.value;
                    if (rol == 1) {
                        $('#estudiante').show().find('input, select').prop('disabled', false);
                        $('#estudiante').find('input, select').prop('required', true);
                        $('#preceptor').hide().find('input, select').prop('disabled', true);
                        $('#admin').hide().find('input, select').prop('disabled', true);
                    } else if (rol == 2) {
                        $('#preceptor').show().find('input, select').prop('disabled', false);
                        $('#preceptor').find('input, select').prop('required', true);
                        $('#estudiante').hide().find('input, select').prop('disabled', true);
                        $('#admin').hide().find('input, select').prop('disabled', true);
                    } else if (rol == 3) {
                        $('#admin').show().find('input, select').prop('disabled', false);
                        $('#admin').find('input, select').prop('required', true);
                        $('#estudiante').hide().find('input, select').prop('disabled', true);
                        $('#preceptor').hide().find('input, select').prop('disabled', true);
                    } else {
                        $('#estudiante').hide();
                        $('#preceptor').hide();
                        $('#admin').hide();
                    }
                }

                /*function mostrarMateriasAnio(valor) {
                    var anio = valor.value;
                    var carrera = $('.selectCarrera').val();
                    if (anio != '') {
                        $('#materias').show();
                        mostrarMateriasAjax(anio, carrera);
                    } else {
                        $('#materias').hide();
                    }
                }*/

                function mostrarSelectSedes(carrera) {
                    recargarSedeAjax(carrera.value);
                    $('.selectAnio').val('');
                    $('#materias').hide();
                }

                function mostrarMateriasCarrera(carrera) {
                    if (carrera.value != '') {
                        $('#materias').show();
                        mostrarMateriasCarreraAjax(carrera.value);
                    } else {
                        $('#materias').hide();
                    }
                }

                //AJAX
                function mostrarMateriasAjax(anio, carrera) {
                    $.ajax({
                        type: 'POST',
                        url: 'pagesAjax/materiasAnioSelect.php',
                        data: 'anio=' + anio + '&carrera=' + carrera,
                        success: function(r) {
                            $('#materias').html(r);
                        }
                    });
                }

                function recargarSedeAjax(codCarrera) {
                    $.ajax({
                        type: 'POST',
                        url: 'pagesAjax/selectSede.php',
                        data: 'carrera=' + codCarrera,
                        success: function(r) {
                            $('#sedes').html(r);
                        }
                    });
                }

                function mostrarMateriasCarreraAjax(carrera) {
                    $.ajax({
                        type: 'POST',
                        url: 'pagesAjax/mostrarMateriasCarreras.php',
                        data: 'carrera=' + carrera,
                        success: function(r) {
                            $('#materias').html(r);
                        }
                    });
                }

                function validarNumeros(valor) {
                    var patron = /^([0-9]+)*$/;
                    if (!patron.test(valor.value)) {
                        valor.value = valor.value.substring(0, valor.value.length - 1);
                    }
                }

                function validarDomicilio(valor) {
                    var patron = /^([a-zA-Z????????????????????????0-9-,.<> ]+)*$/;
                    if (!patron.test(valor.value)) {
                        valor.value = valor.value.substring(0, valor.value.length - 1);
                    }
                }
            </script>
        </head>

        <body>

            <?php
            error_reporting(0);
            if ($_SESSION['estudianteAgregado']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'El estudiante ha sido a??adido al sistema'
                    })
                </script>
            <?php
                unset($_SESSION['estudianteAgregado']);
            }
            if ($_SESSION['preceptorAgregado']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'El preceptor ha sido a??adido al sistema'
                    })
                </script>
            <?php
                unset($_SESSION['preceptorAgregado']);
            }
            if ($_SESSION['adminAgregado']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'El administrador ha sido a??adido al sistema'
                    })
                </script>
            <?php
                unset($_SESSION['adminAgregado']);
            }
            ?>

            <section id="container">
                <?php
                ?>

                <p class="fs-5">Gesti??n de Usuarios</p>
                <hr>
                <p class="fs-6">Completa los datos</p>
                <form action="../controlador/c_agregarUsuario.php" method="post">
                    <div class="form-floating mb-3" id="tipoUsuario">
                        <select class="form-select selectTipoUsuario" onchange="mostrarOpcionesRol(this);" name="rolUser" id="floatingSelect" aria-label="Floating label select example">
                            <option value="" selected>Seleccione...</option>
                            <?php
                            foreach ($listRoles as $rol) {
                                if ($_SESSION['rol'] == 2 && $rol[0] == 1) {
                            ?>
                                    <option value="<?php echo $rol[0]; ?>"><?php echo $rol[1]; ?></option>
                                <?php
                                }
                                if ($_SESSION['rol'] == 3) {
                                ?>
                                    <option value="<?php echo $rol[0]; ?>"><?php echo $rol[1]; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Primero seleccione el tipo de Usuario</label>
                    </div>

                    <div id="estudiante">
                        <p class="fs-6">Completa los datos del estudiante</p>
                        <div class="form-floating mb-3">
                            <input type="text" name="dni" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Dni</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Correo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nombre de Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="pass" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Contrase??a</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="domicilio" oninput="validarDomicilio(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Domicilio</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="codPostal" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">C??digo Postal</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                                <option value="" selected>Seleccione...</option>
                                <?php
                                foreach ($listDepartamentos as $departamento) {
                                ?>
                                    <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Seleccione el departamento donde vive</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="fechaNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Fecha de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="lugarNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Lugar de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" name="cel" class="form-control" oninput="validarNumeros(this);" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nro de Celular</label>
                        </div>

                        <div class="form-floating mb-3" id="selectCarreras">
                            <select class="form-select selectCarrera" onchange="mostrarSelectSedes(this); mostrarMateriasCarrera(this);" name="selectCarreras" id="floatingSelect" aria-label="Floating label select example">
                                <option value="">Seleccione...</option>
                                <?php
                                foreach ($listCarreras as $carrera) {
                                ?>
                                    <option value="<?php echo $carrera[0]; ?>"><?php echo $carrera[1]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Seleccione la carrera al cual se inscribe</label>
                        </div>

                        <div class="form-floating mb-3" id="selectSedes">
                            <select class="form-select" name="selectSede" id="sedes" aria-label="Floating label select example">
                                <option value="">Primero seleccione la carrera</option>
                            </select>
                            <label for="floatingSelect">Seleccione la sede en la que va a cursar</label>
                        </div>

                        <div class="form-floating mb-3" id="anioCursado">
                            <select class="form-select selectAnio" name="anioCursado" id="floatingSelect" aria-label="Floating label select example">
                                <option value="">Seleccione primero la carrera</option>
                                <?php
                                foreach ($listAnios as $anioCursado) {
                                ?>
                                    <option value="<?php echo $anioCursado[0]; ?>"><?php echo $anioCursado[1]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Seleccione el a??o de cursado</label>
                        </div>

                        <!--Materias AJAX-->
                        <div id="materias">

                        </div>

                        <div id="btnGuardar">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>

                    <div id="preceptor">
                        <p class="fs-6">Completa los datos del preceptor</p>
                        <div class="form-floating mb-3">
                            <input type="text" name="dni" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Dni</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Correo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nombre de Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="pass" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Contrase??a</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="domicilio" oninput="validarDomicilio(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Domicilio</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="codPostal" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">C??digo Postal</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                                <option value="" selected>Seleccione...</option>
                                <?php
                                foreach ($listDepartamentos as $departamento) {
                                ?>
                                    <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Seleccione el departamento donde vive</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="fechaNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Fecha de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="lugarNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Lugar de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" name="cel" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nro de Celular</label>
                        </div>

                        <div class="form-floating mb-3" id="selectSedes">
                            <select class="form-select" name="selectSede" id="sedes" aria-label="Floating label select example">
                                <option value="">Seleccione...</option>
                                <?php
                                foreach ($listSedes as $sede) {
                                ?>
                                    <option value="<?php echo $sede[0]; ?>"><?php echo $sede[1]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Seleccione la sede en la que va a administrar las carreras</label>
                        </div>

                        <div id="btnGuardar">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>

                    <div id="admin">
                        <p class="fs-6">Completa los datos del administrador</p>
                        <div class="form-floating mb-3">
                            <input type="text" name="dni" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Dni</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Correo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nombre de Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="pass" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Contrase??a</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="domicilio" oninput="validarDomicilio(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Domicilio</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="codPostal" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">C??digo Postal</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                                <option value="" selected>Seleccione...</option>
                                <?php
                                foreach ($listDepartamentos as $departamento) {
                                ?>
                                    <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Seleccione el departamento donde vive</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="fechaNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Fecha de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="lugarNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Lugar de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" name="cel" oninput="validarNumeros(this);" class="form-control" id="floatingInput" placeholder="Ejemplo">
                            <label for="floatingInput">Nro de Celular</label>
                        </div>

                        <div id="btnGuardar">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </section>
        </body>

        </html>
    <?php
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceder</title>
        <style>
            body {
                background: linear-gradient(to right, lightskyblue, darkturquoise);
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <p class="fs-5">Para acceder a esta secci??n. debe iniciar sesi??n. <a href="../login.php">Click Aqu??</a></p>
    </body>

    </html>
<?php
}
?>