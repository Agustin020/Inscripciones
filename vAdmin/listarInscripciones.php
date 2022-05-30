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
        </head>

        <style>
            section {
                padding: 15px;
            }

            table th,
            td {
                vertical-align: middle;
            }

            table #accion {
                text-align: center;
            }
        </style>

        <script>
            $(document).ready(function() {
                $('#tablaDinamicaLoad').DataTable({
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                    }
                })
            })
        </script>

        <body>
            <section id="container">
                <p class="fs-5">Listado de inscripciones para 3er Año</p>
                <hr>
                <div class="table-responsive-xxl" id="tPrincipal">
                    <table class="table table-hover table-light" id="tablaDinamicaLoad">
                        <thead class="table-dark">
                            <tr>
                                <th>DNI</th>
                                <th>Apellido/s</th>
                                <th>Nombre/s</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Fecha inscripto</th>
                                <th>Carrera</th>
                                <th>Sede</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listInscripcion as $dato) {
                            ?>
                                <tr>
                                    <td><?php echo $dato[0] ?></td>
                                    <td><?php echo $dato[1] ?></td>
                                    <td><?php echo $dato[2] ?></td>
                                    <td><?php echo $dato[7] ?></td>
                                    <td><?php echo $dato[8] ?></td>
                                    <td><?php echo $dato[9] ?></td>
                                    <td><?php echo $dato[11] ?></td>
                                    <td><?php echo $dato[12] ?></td>
                                    <td id="accion">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acción
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li>
                                                    <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalInfoInscripcion<?php echo $dato[0]; ?>">
                                                        Ver más info
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" role="button" onclick="accionEliminar();" href="">
                                                        Eliminar
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!--Modal Ver Info-->
                                <div class="modal fade" id="modalInfoInscripcion<?php echo $dato[0]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Info de inscripción: <?php echo $dato[1] . ' ' . $dato[2]; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[0]; ?>" name="dni" id="floatingLabel" placeholder="Dni" readonly>
                                                    <label for="floatingInput">Dni</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[1]; ?>" name="apellido" id="apellido" placeholder="Apellido" readonly>
                                                    <label for="floatingInput">Apellido/s</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[2]; ?>" name="nombre" id="nombre" placeholder="nombre" readonly>
                                                    <label for="floatingInput">Nombre/s</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[3]; ?>" name="fechaNac" id="fechaNac" placeholder="fechaNac" readonly>
                                                    <label for="floatingInput">Fecha de Nacimiento</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[4]; ?>" name="lugarNac" id="lugarNac" placeholder="lugarNac" readonly>
                                                    <label for="floatingInput">Lugar de Nacimiento</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" name="domicilio" placeholder="Leave a comment" id="floatingTextarea" readonly><?php echo $dato[5]; ?></textarea>
                                                    <label for="floatingTextarea">Domicilio</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[6]; ?>" name="cPostal" id="cPostal" placeholder="cPostal" readonly>
                                                    <label for="floatingInput">Código Postal</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[7]; ?>" name="cel" id="cel" placeholder="cel" readonly>
                                                    <label for="floatingInput">Celular</label>
                                                </div>

                                                <div class="form-floating mb-3" id="correo">
                                                    <input type="email" class="form-control" value="<?php echo $dato[8]; ?>" name="email" id="email" placeholder="Correo Electrónico" readonly>
                                                    <label for="floatingInput">Correo Electrónico</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[9]; ?>" name="fechaInscr" id="fechaInscr" placeholder="fechaInscr" readonly>
                                                    <label for="floatingInput">Fecha de inscripción</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" name="matInscr" style="height: 200px;" placeholder="Leave a comment" id="floatingTextarea" readonly><?php echo $dato[10]; ?></textarea>
                                                    <label for="floatingTextarea">Materias inscriptas</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[11]; ?>" name="carrera" id="carrera" placeholder="carrera" readonly>
                                                    <label for="floatingInput">Carrera</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" value="<?php echo $dato[12]; ?>" name="sede" id="sede" placeholder="sede" readonly>
                                                    <label for="floatingInput">Sede</label>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </body>

        </html>
<?php
    }
}
?>