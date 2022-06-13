<?php
if (isset($_SESSION['username']['usuario']) && isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Listado de Estudiantes de 1ro</title>
            <style type="text/css">
                body {
                    background-color: lightskyblue;
                }

                section {
                    padding: 15px;
                }

                #nuevoEstudiante {
                    display: flex;
                    justify-content: flex-end;
                    margin: 5px;
                }

                th,
                td {
                    vertical-align: middle;
                }

                table #accion {
                    text-align: center;
                }

                .dataTables_length {
                    margin-bottom: 10px;
                }
            </style>


            <script>
                $(document).ready(function() {

                    function addZero(i) {
                        if (i < 10) {
                            i = "0" + i;
                        }
                        return i;
                    }

                    const dNow = new Date();
                    let h = addZero(dNow.getHours());
                    let m = addZero(dNow.getMinutes());

                    let time = h + ":" + m;
                    var localdate = dNow.getDate() + '/' + (dNow.getMonth() + 1) + '/' + dNow.getFullYear() + ' ' + time;

                    $('#tablaDinamicaLoad').DataTable({
                        dom: 'lBfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                title: 'Listado de Estudiantes de ' + <?php echo $_GET['anio']; ?> + '° año',
                                messageTop: 'Reporte: ' + localdate,
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                download: 'open',
                                title: 'Listado de Estudiantes de ' + <?php echo $_GET['anio']; ?> + '° año',
                                messageTop: 'Reporte: ' + localdate,
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                }
                            },
                        ],
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                        }
                    })



                    $('#carrera').change(function() {
                        var codCarrera = $('#carrera').val();
                        if (codCarrera == 0) {
                            $('#sede').prop('disabled', 'disabled');
                        } else {
                            $('#sede').removeAttr('disabled');
                        }
                    });

                });
            </script>
        </head>

        <body>
            <?php
            error_reporting(0);
            if ($_SESSION['bajaOk']) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Confirmado',
                        text: 'El estudiante ha sido dado de baja'
                    })
                </script>
            <?php
                unset($_SESSION['bajaOk']);
            }
            ?>
            <section id="container">
                <p class="fs-5">Lista de todos los estudiantes de <?php echo $anio; ?>° Año</p>
                <hr>

                <div class="table-responsive" id="tPrincipal">
                    <div id="nuevoEstudiante">
                        <a class="btn btn-primary" href="index.php?accion=agregarUsuario">Nuevo Estudiante</a>
                    </div>
                    <table class="table table-hover table-light" id="tablaDinamicaLoad">
                        <thead class="table-dark">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre y Apellido</th>
                                <th>Correo</th>
                                <th>Domicilio</th>
                                <th>Fecha de nacimiento</th>
                                <th>Celular</th>
                                <th>Carrera</th>
                                <th>Sede</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaEstudiantes as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro[0] ?></td>
                                    <td><?php echo $registro[1] ?></td>
                                    <td><?php echo $registro[2] ?></td>
                                    <td><?php echo $registro[3] ?></td>
                                    <td><?php echo $registro[4] ?></td>
                                    <td><?php echo $registro[5] ?></td>
                                    <td><?php echo $registro[6] ?></td>
                                    <td><?php echo $registro[7] ?></td>
                                    <td id="accion">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acción
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li>
                                                    <a class="dropdown-item" href="index.php?accion=infoEstudiante&dni=<?php echo $registro[0]; ?>">
                                                        Ver más info
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.php?accion=verCalificaciones&dni=<?php echo $registro[0]; ?>">
                                                        Calificaciones
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index.php?accion=verHistorialAcademico&dni=<?php echo $registro[0]; ?>">
                                                        Ver historial académico
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modalBaja<?php echo $registro[0]; ?>">
                                                        Dar de baja
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class=" modal fade" id="modalBaja<?php echo $registro[0] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Dar de baja: <?php echo $registro[1] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="../controlador/c_bajaUsuario.php" method="post" style="display: none;">
                                                <div class="modal-body">

                                                    <p class="fs-6">Para continuar debe especificar el motivo de la baja.</p>

                                                    <input type="hidden" name="dni" value="<?php echo $registro[0] ?>">

                                                    <input type="hidden" name="anio" value="<?php echo $_GET['anio'] ?>">

                                                    <input type="hidden" name="sede" value="<?php echo $_GET['sede'] ?>">

                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="motivoBaja" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                        <label for="floatingTextarea2">Motivo de la baja</label>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-danger">Aceptar</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive-xxl" id="tResultado">

                </div>

            </section>
        </body>

        </html>

<?php
    }
}
?>