<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        section {
            margin: 15px;
        }

        form #tipoUsuario {
            width: 500px;
        }

        form #estudiante {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 30px;
            margin: 0 20px;
            border: 2px solid gray;
            padding: 20px;
            border-radius: 10px;
            background-color: whitesmoke;
        }

        form #estudiante p {
            grid-column: 1/3;
        }

        form #estudiante #anioCursado {
            grid-row: 8/9;
            width: 500px;
        }

        form #estudiante #materias {
            grid-column: 1/2;
        }

        form #estudiante #btnGuardar {
            grid-column: 2/3;
            grid-row: 10/11;
            display: flex;
            justify-content: flex-end;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#materias').hide();
            $('.selectAnio').change(function() {
                var anio = $('.selectAnio').val();
                if (anio != '') {
                    $('#materias').show();
                    mostrarMateriasAjax(anio);
                }else{
                    $('#materias').hide();
                }
            })
        })

        //AJAX
        function mostrarMateriasAjax(anio){
            $.ajax({
                type: 'POST',
                url: 'filtrosTareas/filtroRadios.php',
                data: 'anio=' + anio,
                success: function(r) {
                    $('#materias').html(r);
                }
            });
        }
    </script>
</head>

<body>
    <section>
        <?php
        ?>

        <p class="fs-5">Gestión de Usuarios</p>
        <hr>
        <p class="fs-6">Completa los datos</p>
        <form action="" method="post">
            <div class="form-floating mb-3" id="tipoUsuario">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Seleccione...</option>
                    <?php
                    foreach ($listRoles as $rol) {
                    ?>
                        <option value="<?php echo $rol[0]; ?>"><?php echo $rol[1]; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="floatingSelect">Primero seleccione el tipo de Usuario</label>
            </div>

            <div id="estudiante">
                <p class="fs-6">Completa los datos del estudiante</p>
                <div class="form-floating mb-3">
                    <input type="number" name="dni" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Dni</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="correo" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Nombre de Usuario</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="pass" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Contraseña</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="domicilio" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Domicilio</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="codPostal" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Código Postal</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" name="fechaNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Fecha de Nacimiento</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="lugarNac" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Lugar de Nacimiento</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="tel" name="cel" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Nro de Celular</label>
                </div>

                <div class="form-floating mb-3" id="anioCursado">
                    <select class="form-select selectAnio" onchange="mostrarMateriasAnio(this);" name="anioCursado" id="floatingSelect" aria-label="Floating label select example">
                        <option value="">Seleccione...</option>
                        <?php
                        foreach ($listAnios as $anioCursado) {
                        ?>
                            <option value="<?php echo $anioCursado[0]; ?>"><?php echo $anioCursado[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Seleccione el año de cursado</label>
                </div>

                <div id="materias">
                    <p class="fs-6">Selecciona el Espacio Curricular al cual se inscribe</p>
                    <div class="form-check checkList">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            EASJOIASOIASoin
                        </label>
                    </div>
                </div>

                <div id="btnGuardar">
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </section>
</body>

</html>