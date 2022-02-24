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

<div class="contenedor">

    <div id="titleWelcome">
        <p class="fs-5">Lista de estudiantes que requieren acceso al Sistema</p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
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
                            <a name="" id="" class="btn btn-success" href="#" role="button" title="Dar de alta al sistema al estudiante seleccionado">Dar de alta</a>
                            <a name="" id="" class="btn btn-danger" href="#" role="button" title="Elimina al estudiante seleccionado y no le permite el acceso al sistema">Ignorar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>