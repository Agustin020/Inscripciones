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

                th, td{
                    vertical-align: middle;
                }
            </style>

            <script>
                $(document).ready(function() {
                    $('#tablaDinamicaLoad').DataTable({
                        aaSorting: [],
                        paging: false,
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                        }
                    })
                })
            </script>
        </head>

        <body>
            <section id="container">
                <p class="fs-5">Historial Académico</p>
                <hr>
                <p class="fs-6">Se muestran las calificaciones de todas las materias cursadas hasta la actualidad</p>

                <div class="table-responsive-xxl">
                    <table class="table table-hover table-light" id="tablaDinamicaLoad">
                        <thead class="table-dark">
                            <th>Materias</th>
                            <th>Año materia</th>
                            <th>1er Parcial</th>
                            <th>Recup.</th>
                            <th>2do Parcial</th>
                            <th>Recup.</th>
                            <th>Global</th>
                            <th>1er Final</th>
                            <th style="width: 100px;">Fecha Final</th>
                            <th>2do Final</th>
                            <th style="width: 100px;">Fecha Final</th>
                            <th>3er Final</th>
                            <th style="width: 100px;">Fecha Final</th>
                            <th>Condición</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($historialAcademico as $nota) {
                            ?>
                            <tr>
                                <td><?php echo $nota[0]; ?></td>
                                <td><?php echo $nota[1]; ?></td>
                                <td><?php echo $nota[2]; ?></td>
                                <td><?php echo $nota[3]; ?></td>
                                <td><?php echo $nota[4]; ?></td>
                                <td><?php echo $nota[5]; ?></td>
                                <td><?php echo $nota[6]; ?></td>
                                <td><?php echo $nota[7]; ?></td>
                                <td><?php echo $nota[8]; ?></td>
                                <td><?php echo $nota[9]; ?></td>
                                <td><?php echo $nota[10]; ?></td>
                                <td><?php echo $nota[11]; ?></td>
                                <td><?php echo $nota[12]; ?></td>
                                <td><?php echo $nota[13]; ?></td>
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

<?php
    }
}
?>