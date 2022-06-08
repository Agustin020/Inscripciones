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

                form #btnEnviar{
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
            <section id="container">
                <p class="fs-5">Inscribir estudiante</p>
                <hr>
                <p class="fs-6">Completar la inscripción al estudiante a buscar</p>
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
                                            <input type="number" value="<?php echo $datoInscripcion[0]; ?>" class="form-control" id="inpuDni" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputApellido" class="form-label">Apellido</label>
                                            <input type="text" value="<?php echo $datoInscripcion[1]; ?>" class="form-control" id="inputApellido" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputNombre" class="form-label">Nombre</label>
                                            <input type="text" value="<?php echo $datoInscripcion[2]; ?>" class="form-control" id="inpuNombre" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFechaNac" class="form-label">Fecha de Nacimento</label>
                                            <input type="date" class="form-control" id="inputFechaNac" value="<?php echo $datoInscripcion[3]; ?>" readonly>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputLugarNac" class="form-label">Lugar de Nacimento</label>
                                            <input type="text" class="form-control" id="inputLugarNac" value="<?php echo $datoInscripcion[4]; ?>" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputDireccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="inputDirreccion" value="<?php echo $datoInscripcion[5]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCodigoPost" class="form-label">Código Postal</label>
                                            <input type="number" class="form-control" id="inputCodigoPost" value="<?php echo $datoInscripcion[6]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputTelefono" class="form-label">Teléfono</label>
                                            <input type="number" class="form-control" id="inputTelefono" value="<?php echo $datoInscripcion[7]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="inputEmail" value="<?php echo $datoInscripcion[8]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputInscrip" class="form-label">Fecha de Inscripción</label>
                                            <input type="date" class="form-control" id="inputInscrip" value="<?php echo $datoInscripcion[9]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputSede" class="form-label">Sede</label>
                                            <input type="text" class="form-control" id="inputSede" value="<?php echo $datoInscripcion[12]; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputAnio" class="form-label">Año al que se inscribe</label>
                                            <input type="text" class="form-control" id="inputAnio" value="<?php echo $datoInscripcion[13]; ?>° Año" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCarrera" class="form-label">Carrera</label>
                                            <input type="text" class="form-control" id="inputCarrera" value="<?php echo $datoInscripcion[11]; ?>" readonly>
                                        </div>
                                        <div class="col-mb-6">
                                            <label for="textareaMaterias" class="form-label">Materias</label>
                                            <textarea class="form-control" id="textareaMaterias" rows="6" readonly><?php echo $datoInscripcion[10]; ?></textarea>
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="container-input">
                            <div class="col" id="input">
                                <div style="display: flex; flex-direction: column;">
                                    <p class="fs-6">Buscar Estudiante</p>

                                    <select class="form-select" onchange="buscarEstudianteMaterias(this);" id="estudiantesSelect" multiple="multiple">
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

                                </div>
                                <div class="container-fluid">
                                    <form action="" method="post">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">

                                                <div id="resultadoMateriasInscripto">

                                                </div>
                                            </li>
                                            <li class="list-group-item">Año de cursado a inscribir
                                                <select class="form-select" aria-label="Default select example">
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
                                                <select class="form-select" onchange="mostrarMateriasCarrera(this);" aria-label="Default select example">
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
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>

        </html>

<?php
    }
}
?>