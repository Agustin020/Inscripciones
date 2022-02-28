<style type="text/css">
    .contenedor {
        background-color: lightskyblue;
        display: flex;
        flex-direction: column;
        margin: 15px 20px;
    }

    td {
        vertical-align: middle;
    }
</style>

<script>
    function confirmarAlta() {
        var nombre = document.getElementsByTagName("td")[1].innerHTML;
        var apellido = document.getElementsByTagName("td")[2].innerHTML;
        event.preventDefault();
        Swal.fire({
            title: 'Aviso',
            text: 'Desea dar de alta al estudiante ' + nombre + ' ' + apellido + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                var btnAlta = document.getElementById('altabtn');
                location.href = btnAlta;
            }
            return false;

        });
    }


    function confirmarBaja() {
        var nombre = document.getElementsByTagName("td")[1].innerHTML;
        var apellido = document.getElementsByTagName("td")[2].innerHTML;
        event.preventDefault();
        Swal.fire({
            title: 'Aviso',
            text: 'Eliminar al estudiante ' + nombre + ' ' + apellido + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                var btnBaja = document.getElementById('bajabtn');
                location.href = btnBaja;
            }
            return false;

        });
    }
</script>

<div class="contenedor">

    <?php
    error_reporting(0);
    $alta = $_GET['alta'];
    if ($alta == 'ok') {
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire(
                    'Confirmado!',
                    'El estudiante ha sido de alta en el Sistema',
                    'success'
                )
            });
        </script>
    <?php
    } else if ($alta == 'ignorar') {
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire(
                    'Confirmado!',
                    'La solicitud del estudiante de alta ha sido rechazada',
                    'success'
                )
            });
        </script>
    <?php
    }
    ?>
    <div id="titleWelcome">
        <p class="fs-5">Lista de estudiantes que requieren acceso al Sistema</p>
    </div>

    <div class="table-responsive">
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
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $registro) {
                ?>
                    <tr>
                        <td><?php echo $registro['dni'] ?></td>
                        <td><?php echo $registro['nombre'] ?></td>
                        <td><?php echo $registro['apellido'] ?></td>
                        <td><?php echo $registro['correo'] ?></td>
                        <td><?php echo $registro['domicilio'] ?></td>
                        <td><?php echo $registro['fechaNac'] ?></td>
                        <td><?php echo $registro['celular'] ?></td>
                        <td>
                            <a name="" id="altabtn" class="btn btn-success" href="../../vistas/pagesGestion/pageRegistroAccion/acciones.php?accion=alta&dni=<?php echo $registro['dni']; ?>" role="button" title="Dar de alta al sistema al estudiante seleccionado" onclick="return confirmarAlta();">Dar de alta</a>
                            <a name="" id="bajabtn" class="btn btn-danger" href="../../vistas/pagesGestion/pageRegistroAccion/acciones.php?accion=ignorar&dni=<?php echo $registro['dni']; ?>" role="button" title="Ignorar la solicitud al sistema del estudiante seleccionado" role="button" onclick="return confirmarBaja();" title="Elimina al estudiante seleccionado y no le permite el acceso al sistema">Ignorar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>