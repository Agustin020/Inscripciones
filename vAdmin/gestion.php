<?php
session_start();
if (isset($_SESSION['username']['usuario']) && isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3) {
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
                section {
                    background-color: whitesmoke;
                    padding: 15px;
                }

                section .tarjetas {
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr 1fr;
                    column-gap: 20px;
                    align-items: flex-start;
                }
            </style>

        </head>

        <body>
            <?php require('header.php'); ?>
            <!--Container-->

            <section id="container">

                <p class="fs-5">Bienvenido <?php echo $_SESSION['username']['datosUser']; ?></p>

                <div class="tarjetas">
                    <div class="card">
                        <img src="https://www.iesmb.edu.ar/bel/wp-content/uploads/2018/09/ingresss.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Gestión de Usuarios</h5>
                            <p class="card-text">Agrega, edita y elimina Usuarios, cambia de rol</p>
                            <a href="opcionesUsuario.php" class="btn btn-primary">Ver</a>
                        </div>
                    </div>

                    <div class="card" id="card2">
                        <img src="https://www.iesmb.edu.ar/bel/wp-content/uploads/2018/09/ingresss.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Alumnos inscriptos</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Estudiantes 1er Año
                                <a href="index.php?accion=listarEstudiantes&anio=1&sede=<?php echo $_SESSION['sedeActual']; ?>" class="btn btn-primary">Ver Listado</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Estudiantes 2do Año
                                <a href="index.php?accion=listarEstudiantes&anio=2&sede=<?php echo $_SESSION['sedeActual']; ?>" class="btn btn-primary">Ver Listado</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Estudiantes 3er Año
                                <a href="index.php?accion=listarEstudiantes&anio=3&sede=<?php echo $_SESSION['sedeActual']; ?>" class="btn btn-primary">Ver Listado</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card" id="card3">
                        <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1080,h_675/https://www.gqdalya.com/wp-content/uploads/2018/12/calificaciones-blog.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Solicitud de alta</h5>
                            <p class="card-text">Ver los datos de los usuarios que requieren el alta al Sistema</p>
                            <a href="index.php?accion=listarSolicitudAlta" class="btn btn-primary">Ver</a>
                        </div>
                    </div>

                    <div class="card" id="card4">
                        <img src="https://www.frd.utn.edu.ar/wp-content/uploads/elementor/thumbs/student-social-internet-home-profession-p392dtdg10d8z1tfw83rfap7ltcuftrygetuqagr9c.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Solicitud de inscripción</h5>
                            <p class="card-text">Verifica los datos de la inscripción a un año enviado por el estudiante</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Inscripción 1er Año
                                <a href="index.php?accion=listarInscripciones&anio=1&sede=<?php echo $_SESSION['sedeActual']; ?>" class="btn btn-primary">Ver Listado</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Inscripción 2do Año
                                <a href="index.php?accion=listarInscripciones&anio=2&sede=<?php echo $_SESSION['sedeActual']; ?>" class="btn btn-primary">Ver Listado</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Inscripción 3er Año
                                <a href="index.php?accion=listarInscripciones&anio=3&sede=<?php echo $_SESSION['sedeActual']; ?>" class="btn btn-primary">Ver Listado</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="tarjetas">
                    <div class="card" id="card4" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                                Inscripción 1er Año
                                <a href="index.php?accion=gestionarUsuario" class="btn btn-primary">Ver Listado</a>
                            </li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>

                    <div class="card" id="card4" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
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