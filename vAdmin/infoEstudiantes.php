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

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 50px;
        }

        form #botones{
            grid-row: 9/10;
            grid-column: 2/3;
            display: flex;
            justify-content: flex-end;
        }

        form #botones button{
            margin: 0 5px;
        }

    </style>
</head>

<script>
    $(document).ready(function() {
        $('#formulario').find('input, select, check').prop('disabled', true);
        $('#btnCancelar').hide();
        $('#btnGuardar').hide();

        $('#btnEditar').click(function(){
            $('#formulario').find('input, select, check').prop('disabled', false);
            $('#btnEditar').hide();
            $('#btnCancelar').show();
            $('#btnGuardar').show();
            $('input[name=sede]').prop('disabled', true);
        });

        $('#btnCancelar').click(function(){
            $('#formulario').find('input, select, check').prop('disabled', true);
            $('#btnEditar').show();
            $('#btnCancelar').hide();
            $('#btnGuardar').hide();
        });
    });
</script>

<body>
    <section>
        <p class="fs-5">Información del estudiante</p>
        <hr>
        <form action="" method="post" id="formulario">

            <?php
            foreach ($infoEstudiante as $estudiante) {
            ?>

                <div class="form-floating mb-3">
                    <input type="number" name="dni" value="<?php echo $estudiante[0]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Dni</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nombre" value="<?php echo $estudiante[1]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="apellido" value="<?php echo $estudiante[2]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="correo" value="<?php echo $estudiante[3]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="user" value="<?php echo $estudiante[4]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Nombre de Usuario</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="domicilio" value="<?php echo $estudiante[5]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Domicilio</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" name="codPostal" value="<?php echo $estudiante[6]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Código Postal</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="departamento" id="floatingSelect" aria-label="Floating label select example">
                        <?php
                        foreach ($departamentoUsuario as $departamento) {
                        ?>
                            <option value="<?php echo $departamento[0]; ?>" selected><?php echo $departamento[1]; ?> (Actual)</option>
                        <?php
                        }
                        foreach ($listDepartamentos as $listadoDep) {
                        ?>
                            <option value="<?php echo $listadoDep[0]; ?>"><?php echo $listadoDep[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Departamento</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="lugarNac" value="<?php echo $estudiante[8]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Lugar de nacimiento</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" name="fechaNac" value="<?php echo $estudiante[9]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Fecha de nacimiento</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="tel" name="celular" value="<?php echo $estudiante[10]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Celular</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="anioCursado" id="floatingSelect" aria-label="Floating label select example">
                        <?php
                        foreach ($anioCursadoEstudiante as $anioActual) {
                        ?>
                            <option value="<?php echo $anioActual[0]; ?>" selected><?php echo $anioActual[1]; ?> (Actual)</option>
                        <?php
                        }
                        foreach ($aniosCursado as $anio) {
                        ?>
                            <option value="<?php echo $anio[0]; ?>"><?php echo $anio[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Año de Cursado</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="carrera" id="floatingSelect" aria-label="Floating label select example">
                        <?php
                        foreach ($listCarreraEstudiante as $carreraActual) {
                        ?>
                            <option value="<?php echo $carreraActual[0]; ?>" selected><?php echo $carreraActual[1]; ?> (Actual)</option>
                        <?php
                        }
                        foreach ($listCarreras as $carrera) {
                        ?>
                            <option value="<?php echo $carrera[0]; ?>"><?php echo $carrera[1]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Carrera</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="sede" value="<?php echo $estudiante[13]; ?>" class="form-control" id="floatingInput" placeholder="ejemplo">
                    <label for="floatingInput">Sede</label>
                </div>

                <div class="list-group">
                    Materias
                    <?php
                    foreach ($listMateriasEstudiante as $materias) {
                    ?>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" checked type="checkbox" value="<?php echo $materias[0]; ?>">
                            <?php echo $materias[1]; ?>
                        </label>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>

            <div id="botones">
                <button type="button" id="btnEditar" class="btn btn-primary">Editar</button>
                <button type="button" id="btnCancelar" class="btn btn-danger">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-success">Guardar cambios</button>
            </div>

        </form>
    </section>
</body>

</html>