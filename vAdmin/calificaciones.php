<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section {
            margin: 15px 20px;
        }

        body {
            background-color: lightskyblue;
        }


        th,
        td {
            vertical-align: middle;
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
                        title: 'Calificaciones',
                        messageTop: 'Reporte: ' + localdate,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Calificaciones',
                        messageTop: 'Reporte: ' + localdate,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                        }
                    },
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            })
        })
    </script>
</head>

<body>
    <section>
        <p class="fs-5">Calificaciones del estudiante</p>
        <hr>

        <div class="table-responsive">
            <table class="table table-hover table-light" id="tablaDinamicaLoad">
                <thead class="table-dark">
                    <th>Materias</th>
                    <th>1er Parcial</th>
                    <th>Recuperatorio</th>
                    <th>2do Parcial</th>
                    <th>Recuperatorio</th>
                    <th>Global</th>
                    <th>1er Final</th>
                    <th style="width: 100px;">Fecha Final</th>
                    <th>2do Final</th>
                    <th style="width: 100px;">Fecha Final</th>
                    <th>3er Final</th>
                    <th style="width: 100px;">Fecha Final</th>
                    <th>Condición</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($listCalifEstudiante as $calif) {
                    ?>
                        <tr>
                            <td><?php echo $calif[0]; ?></td>
                            <td><?php echo $calif[1]; ?></td>
                            <td><?php echo $calif[2]; ?></td>
                            <td><?php echo $calif[3]; ?></td>
                            <td><?php echo $calif[4]; ?></td>
                            <td><?php echo $calif[5]; ?></td>
                            <td><?php echo $calif[6]; ?></td>
                            <td><?php echo $calif[7]; ?></td>
                            <td><?php echo $calif[8]; ?></td>
                            <td><?php echo $calif[9]; ?></td>
                            <td><?php echo $calif[10]; ?></td>
                            <td><?php echo $calif[11]; ?></td>
                            <td><?php echo $calif[12]; ?></td>
                            <td><button type="button" class="btn btn-outline-primary">Editar</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </section>
</body>

</html>