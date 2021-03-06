<?php
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 1) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                section {
                    padding: 15px;
                }

                form {
                    margin: 0 20px;
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    column-gap: 50px;
                }

                form #selectCarreras {
                    grid-row: 6/7;
                }

                form #selectSedes {
                    grid-row: 6/7;
                }

                form #anioCursado {
                    grid-row: 7/8;
                }

                form #materias {
                    grid-row: 8/9;
                }

                form #btnEnviar {
                    grid-row: 9/10;
                    grid-column: 2/3;
                    display: flex;
                    justify-content: flex-end;
                }
            </style>

            <script>
                function mostrarSelectSedes(carrera) {
                    var codCarrera = carrera.value;
                    mostrarSedesAjax(codCarrera);
                }

                function mostrarMateriasCarrera(carrera) {
                    if (carrera.value != '') {
                        $('#materias').show(200);
                        mostrarMateriasCarreraAjax(carrera.value);
                    } else {
                        $('#materias').hide(200);
                    }
                }

                //AJAX
                function mostrarSedesAjax(codCarrera) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/mostrarSedesCarrera.php',
                        data: 'carrera=' + codCarrera,
                        success: function(r) {
                            $('#sedes').html(r);
                        }
                    });
                }

                function mostrarMateriasCarreraAjax(codCarrera) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/mostrarMateriasCarreras.php',
                        data: 'carrera=' + codCarrera,
                        success: function(r) {
                            $('#materias').html(r);
                        }
                    });
                }

                function validarDomicilio(valor) {
                    var patron = /^[a-zA-Z ????????????????????0-9,."-]+$/;
                    if (!patron.test(valor.value)) {
                        valor.value = valor.value.substring(0, valor.value.length - 1);
                    }
                }
                
            </script>

        </head>

        <body>
            <?php
            if ($_SESSION['inscripcionOk']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo',
                        text: 'La inscripci??n se ha realizado'
                    })
                </script>
            <?php
                unset($_SESSION['inscripcionOk']);
            }
            ?>
            <section id="container">
                <p class="fs-5">Inscripci??n</p>
                <hr>

                <?php
                if ($anioInscripto != $anioActual) {
                ?>
                    <p class="fs-6">Llenar los datos para completar la inscripci??n</p>

                    <form action="../controlador/c_es_agregarInscripcion.php" method="post">

                        <div class="form-floating mb-3">
                            <input type="number" name="dni" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Dni</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Apellido/s</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Nombre/s</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="fechaNac" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Fecha de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="lugarNac" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Lugar de Nacimiento</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="domicilio" oninput="validarDomicilio(this);" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Domicilio</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="codPostal" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">C??digo Postal</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" name="cel" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Nro de Celular</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="Ejemplo" required>
                            <label for="floatingInput">Correo</label>
                        </div>

                        <div class="form-floating mb-3" id="selectCarreras">
                            <select class="form-select selectCarrera" onchange="mostrarSelectSedes(this); mostrarMateriasCarrera(this);" name="selectCarreras" id="floatingSelect" aria-label="Floating label select example" required>
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
                            <select class="form-select" name="selectSede" id="sedes" aria-label="Floating label select example" required>
                                <option value="">Primero seleccione la carrera</option>
                            </select>
                            <label for="floatingSelect">Seleccione la sede en la que va a cursar</label>
                        </div>

                        <div class="form-floating mb-3" id="anioCursado">
                            <select class="form-select selectAnio" name="anioCursado" id="floatingSelect" aria-label="Floating label select example" required>
                                <option value="">Seleccione...</option>
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

                        <div id="materias">

                        </div>

                        <div id="btnEnviar">
                            <button type="submit" class="btn btn-primary">Enviar inscripci??n</button>
                        </div>

                    </form>

                <?php
                } else {
                ?>
                    <p class="fs-6"><b>Aviso: </b>Ya te has inscripto con tus datos y los de los espacios curriculares a cursar.</p>
                <?php
                }
                ?>

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