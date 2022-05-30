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

                p {
                    margin-bottom: 0 !important;
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
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" id="tResultado">

                </div>
            </section>
        </body>

        </html>

<?php
    }
}
?>