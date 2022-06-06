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
                body {
                    background-color: rgba(144, 146, 147, 0.663);
                }

                .container-fields,
                .container-input {
                    width: 50%;
                }

                #fields {
                    position: relative;
                    width: 80%;
                    margin: 5%;
                }

                #input {
                    position: relative;
                    width: 90%;
                    margin: 5%;
                }

                .list-group-item {
                    background-color: transparent;
                }

                section {
                    padding: 15px;
                }
            </style>

            <script>
                function mostrarMateriasCarrera(selectCarrera) {
                    var codCarrera = selectCarrera.value;
                    $.ajax({
                        type: 'POST',
                        url: 'pagesAjax/mostrarMateriasCarreras.php',
                        data: 'carrera=' + codCarrera,
                        success: function(r) {
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
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="container-input">
                            <div class="col" id="input">
                                <div class="container-fluid">
                                    <nav class="navbar navbar-expand-lg navbar-light">
                                        <a class="navbar-brand" href="#">Buscar ingresante</a>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <form class="d-flex">
                                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                                <button class="btn btn-outline-success" type="submit">Search</button>
                                            </form>
                                        </div>
                                </div>
                                <div class="container-fluid">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Año de cursado
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
                                        <li class="list-group-item">Carreras
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
                                </div>
                                </nav>
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