<?php
session_start();
if (isset($_SESSION['username']['usuario']) && isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 1) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <?php require('libreria.php') ?>
            <style type="text/css">
                body {
                    background-color: lightblue;
                }

                .contenedor {
                    margin: 15px;
                }

            </style>

        </head>

        <body>
            <?php require('header.php'); ?>
            <!--Container-->

            <div class="contenedor">
                <p class="fs-5">Bienvenido</p>

                <div class="card-group">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Calificaciones</h5>
                            <p class="card-text">Mostrar las calificaciones del año de cursado actual</p>
                            <p class="card-text"><a href="#" class="btn btn-primary">Ver</a></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Historial Academico</h5>
                            <p class="card-text">Mostrar las calificaciones de todas las materias cursadas</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Inscripción</h5>
                            <p class="card-text">Inscribirse a un año de cursado. Llenar un formulario con los datos personales y las materias a cursar</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>


        </body>

        </html>
<?php
    }
}
?>