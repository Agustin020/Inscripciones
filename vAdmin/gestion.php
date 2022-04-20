<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('libreria.php') ?>
    <style type="text/css">
        .contenedor {
            background-color: darkblue;
            display: flex;
            flex-direction: column;
        }

        .contenedor #titleWelcome p {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin: 15px 30px;
            color: white;
        }

        .contenedor .tarjetas {
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    <?php require('header.php'); ?>
    <!--Container-->

    <div class="contenedor">
        <div id="titleWelcome">
            <p class="fs-4">Bienvenido</p>
        </div>

        <div class="tarjetas">
            <div class="card" style="width: 18rem;">
                <img src="https://www.iesmb.edu.ar/bel/wp-content/uploads/2018/09/ingresss.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Usuarios</h5>
                    <p class="card-text">Agrega, edita y elimina Usuarios, cambia de rol</p>
                    <a href="opcionesUsuario.php" class="btn btn-primary">Ver</a>
                </div>
            </div>

            <div class="card" id="card2" style="width: 18rem;">
                <img src="https://www.iesmb.edu.ar/bel/wp-content/uploads/2018/09/ingresss.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Alumnos inscriptos</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Estudiantes 1er Año
                        <a href="index.php?accion=listarEstudiantes1ro&anio=1" class="btn btn-primary">Ver Listado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Estudiantes 2do Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Estudiantes 3er Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                </ul>
            </div>

            <div class="card" id="card3" style="width: 18rem;">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1080,h_675/https://www.gqdalya.com/wp-content/uploads/2018/12/calificaciones-blog.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Calificaciones</h5>
                    <p class="card-text">Coloca, modifica y consulta las notas del respectivo estudiante</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Estudiantes 1er Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Estudiantes 2do Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Estudiantes 3er Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                </ul>
            </div>

            <div class="card" id="card4" style="width: 18rem;">
                <img src="https://www.frd.utn.edu.ar/wp-content/uploads/elementor/thumbs/student-social-internet-home-profession-p392dtdg10d8z1tfw83rfap7ltcuftrygetuqagr9c.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Solicitud de inscripción</h5>
                    <p class="card-text">Verifica los datos de la inscripción a un año enviado por el estudiante</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Inscripción 1er Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Inscripción 2do Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-around d-flex align-items-center">
                        Inscripción 3er Año
                        <a href="#" class="btn btn-primary">Ver Listado</a>
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
    </div>


</body>

</html>