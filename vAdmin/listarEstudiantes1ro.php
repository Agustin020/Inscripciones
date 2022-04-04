<head>
    <title>Listado de Estudiantes de 1ro</title>
    <style type="text/css">
        .contenedor {
            display: flex;
            flex-direction: column;
            margin: 15px 20px;
        }

        body {
            background-color: lightskyblue;
        }

        .contenedor>* {
            margin: 5px 10px;
        }

        form {
            display: flex;
            justify-content: space-evenly;

        }

        form .search {
            display: flex;
            align-items: center;
        }

        form .search>* {
            width: auto;
        }

        #nuevoEstudiante {
            display: flex;
            justify-content: flex-end;
            margin: 5px;
        }

        td {
            vertical-align: middle;
        }
    </style>

    <script>
        $(document).ready(function() {
            recargarListaSede();

            $('#busquedaInput').keyup(function() {
                var campo = $(this).val();
                if (campo.length == 0) {
                    $('#tPrincipal').show();
                    $('#tResultado').hide();

                } else {
                    $('#tResultado').show();
                    $('#tPrincipal').hide();
                    buscarEstudianteInput();
                }
            });

            $('#filtroInput').change(function() {
                var codSelect = $('#filtroInput').val();
                if (codSelect == 0) {
                    $('#busquedaInput').val('');
                    $('#busquedaInput').prop('disabled', 'disabled');
                    $('#busquedaInput').prop('placeholder', 'Seleccione la opción');
                } else {
                    $('#busquedaInput').removeAttr('disabled');
                    $('#busquedaInput').prop('placeholder', 'Escribe aqui');
                }
            });

            $('#carrera').change(function() {
                recargarListaSede();
                var codCarrera = $('#carrera').val();
                if (codCarrera == 0) {
                    $('#sede').prop('disabled', 'disabled');
                } else {
                    $('#sede').removeAttr('disabled');
                }
            });

            //Busqueda por selects
            $('#sede').change(function() {
                var codCarrera = $('#carrera').val();
                var codSede = $('#sede').val();
                var anio = $('#anio').val();

                if (codSede == 0) {
                    $('#tPrincipal').show();
                    $('#tResultado').hide();
                } else {
                    $('#tResultado').show();
                    $('#tPrincipal').hide();
                    buscarEstudianteSelect(codCarrera, codSede, anio);
                }

            });

        });

        //ajax
        function recargarListaSede() {
            $.ajax({
                type: 'POST',
                url: 'pagesAjax/selectSede.php',
                data: 'carrera=' + $('#carrera').val(),
                success: function(r) {
                    $('#sede').html(r);
                }
            });
        }

        function buscarEstudianteInput() {
            $.ajax({
                type: 'POST',
                url: 'pagesAjax/busquedaInput.php',
                data: 'busqueda=' + $('#busquedaInput').val() +
                    '&filtroInput=' + $('#filtroInput').val() +
                    '&anio=' + $('#anio').val(),
                success: function(r) {
                    $('#tResultado').html(r);
                }
            });
        }

        function buscarEstudianteSelect(codCarrera, codSede, anio) {
            $.ajax({
                type: 'POST',
                url: 'pagesAjax/busquedaSelect.php',
                data: 'codCarrera=' + codCarrera + '&codSede=' + codSede + '&anio=' + anio,
                success: function(r) {
                    $('#tResultado').html(r);
                }
            });
        }
    </script>
</head>

<div class="contenedor">
    <p class="fs-5 text-uppercase fw-bold">Lista de todos los estudiantes que estan cursando el primer año de cada carrera</p>
    <p class=" fs-5">Filtros de búsqueda</p>

    <form>
        <input type="hidden" name="anio" id="anio" value="<?php echo $anio ?>">
        <div class="search">
            <input type="text" id="busquedaInput" name="busquedaInput" class="form-control" placeholder="Seleccione la opción" disabled>
            <select class="form-select" id="filtroInput" name="filtroInput" required>
                <option value="">Búsqueda por...</option>
                <option value="1">DNI</option>
                <option value="2">Nombre</option>
                <option value="3">Apellido</option>
            </select>
        </div>
        
        <div class="form-floating select">
            <select class="form-select" name="carrera" id="carrera" required>
                <option value="0">Seleccione la carrera</option>
                <?php
                foreach ($listCarrera as $registro) {
                ?>
                    <option value="<?php echo $registro[0] ?>"><?php echo $registro[1] ?></option>
                <?php } ?>
            </select>
            <label for="floatingSelect">Búsqueda por carrera</label>
        </div>

        <div class="form-floating select">
            <select class="form-select" name="sede" id="sede" aria-label="Floating label select example" required disabled>

            </select>
            <label for="floatingSelect">Búsqueda por sede</label>
        </div>
    </form>

    <div class="table-responsive" id="tPrincipal">
        <div id="nuevoEstudiante">
            <a class="btn btn-primary" href="index.php?accion=registrarEstudiante">Nuevo Estudiante</a>
        </div>
        <table class="table table-hover table-light">
            <thead class="table-dark">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Domicilio</th>
                    <th>Nacimiento</th>
                    <th>Celular</th>
                    <th>Carrera</th>
                    <th>Sede</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista1ro as $registro) {
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
                        <td><?php echo $registro[8] ?></td>
                        <td>
                            <a name="" id="" class="btn btn-danger" href="#" role="button" title="Elimina al estudiante seleccionado y no le permite el acceso al sistema">Baja</a>
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
</div>