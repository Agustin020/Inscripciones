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

        form #estudiante,
        form #preceptor,
        form #admin {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 30px;
            margin: 0 20px;
            border: 2px solid gray;
            padding: 20px;
            border-radius: 10px;
            background-color: whitesmoke;
        }

        form #estudiante p,
        form #preceptor p,
        form #admin p {
            grid-column: 1/3;
        }

        form #estudiante #selectCarreras,
        form #preceptor #selectCarreras {
            grid-row: 8/9;
            width: auto;
        }

        form #estudiante #selectSedes,
        form #preceptor #selectSedes {
            grid-row: 8/9;
            width: 500px;
        }

        form #estudiante #anioCursado,
        form #preceptor #anioCursado {
            grid-row: 9/10;
            width: 500px;
        }

        form #estudiante #materias,
        form #preceptor #materias {
            grid-column: 1/2;
        }

        form #estudiante #btnGuardar,
        form #preceptor #btnGuardar,
        form #admin #btnGuardar {
            grid-column: 2/3;
            grid-row: 11/12;
            display: flex;
            justify-content: flex-end;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.selectTipoUsuario').val('');
            $('#estudiante').hide();
            $('#preceptor').hide();
            $('#admin').hide();
        })

        function mostrarOpcionesRol(rol) {
            var rol = rol.value;
            if (rol == 1) {
                $('#estudiante').show().find('input, select').prop('disabled', false);
                $('#preceptor').hide().find('input, select').prop('disabled', true);
                $('#admin').hide().find('input, select').prop('disabled', true);
            } else if (rol == 2) {
                $('#preceptor').show().find('input, select').prop('disabled', false);
                $('#estudiante').hide().find('input, select').prop('disabled', true);
                $('#admin').hide().find('input, select').prop('disabled', true);
            } else if (rol == 3) {
                $('#admin').show().find('input, select').prop('disabled', false);
                $('#estudiante').hide().find('input, select').prop('disabled', true);
                $('#preceptor').hide().find('input, select').prop('disabled', true);
            }
        }

        /*function mostrarMateriasAnio(valor) {
            var anio = valor.value;
            var carrera = $('.selectCarrera').val();
            if (anio != '') {
                $('#materias').show();
                mostrarMateriasAjax(anio, carrera);
            } else {
                $('#materias').hide();
            }
        }*/

        function mostrarSelectSedes(carrera) {
            recargarSedeAjax(carrera.value);
            $('.selectAnio').val('');
            $('#materias').hide();
        }

        function mostrarMateriasCarrera(carrera){
            if(carrera.value != ''){
                $('#materias').show();
                mostrarMateriasCarreraAjax(carrera.value);
            }else{
                $('#materias').hide();
            }
        }

        //AJAX
        function mostrarMateriasAjax(anio, carrera) {
            $.ajax({
                type: 'POST',
                url: 'pagesAjax/materiasAnioSelect.php',
                data: 'anio=' + anio + '&carrera=' + carrera,
                success: function(r) {
                    $('#materias').html(r);
                }
            });
        }

        function recargarSedeAjax(codCarrera) {
            $.ajax({
                type: 'POST',
                url: 'pagesAjax/selectSede.php',
                data: 'carrera=' + codCarrera,
                success: function(r) {
                    $('#sedes').html(r);
                }
            });
        }

        function mostrarMateriasCarreraAjax(carrera){
            $.ajax({
                type: 'POST',
                url: 'pagesAjax/mostrarMateriasCarreras.php',
                data: 'carrera=' + carrera,
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
        <form action="../controlador/c_agregarUsuario.php" method="post">
            <div class="form-floating mb-3" id="tipoUsuario">
                <select class="form-select selectTipoUsuario" onchange="mostrarOpcionesRol(this);" name="rolUser" id="floatingSelect" aria-label="Floating label select example">
                    <option value="" selected>Seleccione...</option>
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
                    <input type="text" name="domicilio" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Domicilio</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="codPostal" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Código Postal</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                        <option value="" selected>Seleccione...</option>
                        <?php
                        foreach ($listDepartamentos as $departamento) {
                        ?>
                            <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Seleccione el departamento donde vive</label>
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

                <div class="form-floating mb-3" id="selectCarreras">
                    <select class="form-select selectCarrera" onchange="mostrarSelectSedes(this); mostrarMateriasCarrera(this);" name="selectCarreras" id="floatingSelect" aria-label="Floating label select example">
                        <option value="">Seleccione...</option>
                        <?php
                        foreach ($listCarreras as $carrera) {
                        ?>
                            <option value="<?php echo $carrera[0]; ?>"><?php echo $carrera[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Seleccione la carrera al cual se inscribe</label>
                </div>

                <div class="form-floating mb-3" id="selectSedes">
                    <select class="form-select" name="selectSede" id="sedes" aria-label="Floating label select example">
                        <option value="">Primero seleccione la carrera</option>
                    </select>
                    <label for="floatingSelect">Seleccione la sede en la que va a cursar</label>
                </div>

                <div class="form-floating mb-3" id="anioCursado">
                    <select class="form-select selectAnio" name="anioCursado" id="floatingSelect" aria-label="Floating label select example">
                        <option value="">Seleccione primero la carrera</option>
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

                <!--Materias AJAX-->
                <div id="materias">

                </div>

                <div id="btnGuardar">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>

            <div id="preceptor">
                <p class="fs-6">Completa los datos del preceptor</p>
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
                    <input type="text" name="domicilio" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Domicilio</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="codPostal" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Código Postal</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                        <option value="" selected>Seleccione...</option>
                        <?php
                        foreach ($listDepartamentos as $departamento) {
                        ?>
                            <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Seleccione el departamento donde vive</label>
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

                <div class="form-floating mb-3" id="selectSedes">
                    <select class="form-select" name="selectSede" id="sedes" aria-label="Floating label select example">
                        <option value="">Seleccione...</option>
                        <?php
                        foreach ($listSedes as $sede) {
                        ?>
                            <option value="<?php echo $sede[0]; ?>"><?php echo $sede[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Seleccione la sede en la que va a administrar las carreras</label>
                </div>

                <div id="btnGuardar">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>

            <div id="admin">
                <p class="fs-6">Completa los datos del administrador</p>
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
                    <input type="text" name="domicilio" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Domicilio</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="codPostal" class="form-control" id="floatingInput" placeholder="Ejemplo">
                    <label for="floatingInput">Código Postal</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                        <option value="" selected>Seleccione...</option>
                        <?php
                        foreach ($listDepartamentos as $departamento) {
                        ?>
                            <option value="<?php echo $departamento[0]; ?>"><?php echo $departamento[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Seleccione el departamento donde vive</label>
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

                <div id="btnGuardar">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </section>
</body>

</html>