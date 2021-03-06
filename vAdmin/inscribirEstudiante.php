<?php
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 2) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <style>
                .container-fields,
                .container-input {
                    width: 50%;
                }

                #fields {
                    position: relative;
                    width: 80%;
                    margin: 0 5%;
                }

                #input {
                    position: relative;
                    width: 90%;
                    margin: 0 5%;
                }

                .list-group-item {
                    background-color: transparent;
                }

                section {
                    padding: 15px;
                }

                form #btnEnviar {
                    display: flex;
                    justify-content: flex-end;
                }
            </style>

            <script>
                $(document).ready(function() {
                    $("#estudiantesSelect").select2({
                        theme: "classic",
                        maximumSelectionLength: 1,
                        language: {
                            noResults: function() {
                                return "No hay resultados";
                            },
                            searching: function() {
                                return "Buscando..";
                            },
                            maximumSelected: function() {
                                return "Solo puedes seleccionar un estudiante";
                            }
                        }
                    });
                });
            </script>

            <script>
                function buscarEstudianteMaterias(valor) {
                    var dni = valor.value;
                    $.ajax({
                        type: 'POST',
                        url: 'pagesAjax/materiasEstudiante.php',
                        data: 'dni=' + dni,
                        success: function(r) {
                            $('#resultadoMateriasInscripto').html(r);
                        }
                    });
                }

                function mostrarMateriasCarrera(selectCarrera) {
                    var codCarrera = selectCarrera.value;
                    $.ajax({
                        type: 'POST',
                        url: 'pagesAjax/mostrarMateriasCarreras.php',
                        data: 'carrera=' + codCarrera,
                        success: function(r) {
                            $('#divisor').show();
                            $('#resultadoMaterias').html(r);
                        }
                    })
                }
            </script>

        </head>

        <body>
            <?php
            error_reporting(0);
            if ($_SESSION['estudianteInscripto']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Confirmado',
                        text: 'El estudiante ha sido inscripto'
                    })
                </script>
            <?php
                unset($_SESSION['estudianteInscripto']);
            }
            if ($_SESSION['errorMateriasInscriptas']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error',
                        text: 'Algunas materias que selecciono para el estudiante no se han ' +
                            'podido asignar ya que el estudiante est?? inscripto en esas materias. Intente nuevamente.'
                    })
                </script>
            <?php
                unset($_SESSION['errorMateriasInscriptas']);
            }

            if ($_SESSION['fechaActualIgual']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error',
                        text: 'El estudiante ya ha sido inscripto hoy, intente inscribirlo ma??ana nuevamente'
                    })
                </script>
            <?php
                unset($_SESSION['fechaActualIgual']);
            }
            ?>

            <section id="container">
                <p class="fs-5">Inscribir estudiante</p>
                <hr>
                <p class="fs-6">Completar la inscripci??n al estudiante a buscar</p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="container-fields">
                            <div class="col" id="fields">
                                <?php
                                foreach ($listInscripcion as $datoInscripcion) {
                                ?>
                                    <form class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputDni" class="form-label">DNI</label>
                                            <input type="number" value="<?php echo $datoInscripcion[1]; ?>" class="form-control" id="inpuDni" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputApellido" class="form-label">Apellido</label>
                                            <input type="text" value="<?php echo $datoInscripcion[2]; ?>" class="form-control" id="inputApellido" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputNombre" class="form-label">Nombre</label>
                                            <input type="text" value="<?php echo $datoInscripcion[3]; ?>" class="form-control" id="inpuNombre" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFechaNac" class="form-label">Fecha de Nacimento</label>
                                            <input type="date" class="form-control" id="inputFechaNac" value="<?php echo $datoInscripcion[4]; ?>" readonly>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputLugarNac" class="form-label">Lugar de Nacimento</label>
                                            <input type="text" class="form-control" id="inputLugarNac" value="<?php echo $datoInscripcion[5]; ?>" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputDireccion" class="form-label">Direcci??n</label>
                                            <input type="text" class="form-control" id="inputDirreccion" value="<?php echo $datoInscripcion[6]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCodigoPost" class="form-label">C??digo Postal</label>
                                            <input type="number" class="form-control" id="inputCodigoPost" value="<?php echo $datoInscripcion[7]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputTelefono" class="form-label">Tel??fono</label>
                                            <input type="number" class="form-control" id="inputTelefono" value="<?php echo $datoInscripcion[8]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Correo Electr??nico</label>
                                            <input type="email" class="form-control" id="inputEmail" value="<?php echo $datoInscripcion[9]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputInscrip" class="form-label">Fecha de Inscripci??n</label>
                                            <input type="date" class="form-control" id="inputInscrip" value="<?php echo $datoInscripcion[10]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputSede" class="form-label">Sede</label>
                                            <input type="text" class="form-control" id="inputSede" value="<?php echo $datoInscripcion[13]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputAnio" class="form-label">A??o al que se inscribe</label>
                                            <input type="text" class="form-control" id="inputAnio" value="<?php echo $datoInscripcion[14]; ?>?? A??o" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCarrera" class="form-label">Carrera</label>
                                            <input type="text" class="form-control" id="inputCarrera" value="<?php echo $datoInscripcion[12]; ?>" readonly>
                                        </div>
                                        <div class="col-mb-6">
                                            <label for="textareaMaterias" class="form-label">Materias</label>
                                            <textarea class="form-control" id="textareaMaterias" rows="6" readonly><?php echo $datoInscripcion[11]; ?></textarea>
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="container-input">
                            <form action="../controlador/c_inscribirEstudiante.php" method="post">
                                <div class="col" id="input">

                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                                    <input type="hidden" name="dniInscripcion" value="<?php echo $_GET['dni']; ?>">

                                    <input type="hidden" name="">

                                    <p class="fs-6">Buscar Estudiante</p>

                                    <select class="form-select" name="dni" onchange="buscarEstudianteMaterias(this);" id="estudiantesSelect" multiple="multiple">
                                        <optgroup label="Estudiantes">
                                            <?php
                                            foreach ($listEstudiantes as $estudiante) {
                                            ?>
                                                <option value="<?php echo $estudiante[0]; ?>">
                                                    <?php echo $estudiante[0] . ' - ' . $estudiante[1] . ' ' . $estudiante[2] . ' - ' . $estudiante[3] . ' - ' . $estudiante[4]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </optgroup>
                                    </select>

                                    <div class="container-fluid">

                                        <input type="hidden" name="sede" value="<?php echo $_SESSION['sedeActual']; ?>">

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">

                                                <div id="resultadoMateriasInscripto">

                                                </div>
                                            </li>
                                            <li class="list-group-item">A??o de cursado a inscribir
                                                <select class="form-select" name="selectAnio" aria-label="Default select example">
                                                    <option value="" selected>Seleccione...</option>
                                                    <?php
                                                    foreach ($listAnioCursado as $anio) {
                                                    ?>
                                                        <option value="<?php echo $anio[0]; ?>"><?php echo $anio[1]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </li>
                                            <li class="list-group-item">Carrera a inscribir
                                                <select class="form-select" name="selectCarrera" onchange="mostrarMateriasCarrera(this);" aria-label="Default select example">
                                                    <option value="" selected>Seleccione...</option>
                                                    <?php
                                                    foreach ($listCarrera as $carrera) {
                                                    ?>
                                                        <option value="<?php echo $carrera[0]; ?>"><?php echo $carrera[1]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </li>
                                            <li class="list-group-item">

                                                <div id="resultadoMaterias">

                                                </div>

                                            </li>

                                        </ul>
                                        <div id="btnEnviar">
                                            <button type="submit" id="btnSubmit" class="btn btn-primary">Aceptar</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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