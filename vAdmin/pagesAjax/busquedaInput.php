<?php

$link = mysqli_connect('localhost', 'root', 'agus21', 'inscripciones2.0', 3307);

$busquedaInput = $_POST["busqueda"];
$filtroInput = $_POST["filtroInput"];
$anio = $_POST["anio"];

$html = '
<table class="table table-hover table-light">
<div id="nuevoEstudiante">
    <a class="btn btn-primary" href="index.php?accion=registrarEstudiante">Nuevo Estudiante</a>
</div>
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
<tbody>';

switch ($filtroInput) {
    case 1:
        $sql = "SELECT us.`dni`, us.`nombre`, us.`apellido`, us.`correo`, us.`domicilio`, us.`fechaNac`, us.`celular`, carr.`nombre`, s.`nombre`
                FROM usuario AS us, usuario_carrera AS uc, carrera AS carr, sede AS s, usuario_sede AS usede, estudiante AS es
                WHERE us.dni = es.dniUsuario AND es.idAnioCursado3 = '$anio'
                AND us.`dni` = uc.`dniUsuario3` AND uc.`codigoCarrera` = carr.`codigo`
                AND us.`dni` = usede.dniUsuario4 AND usede.codigoSede3 = s.`codigo`
                AND us.dni LIKE '$busquedaInput%'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $html .= '<tr>
                            <td>' . $row[0] . '</td>
                            <td>' . $row[1] . '</td>
                            <td>' . $row[2] . '</td>
                            <td>' . $row[3] . '</td>
                            <td>' . $row[4] . '</td>
                            <td>' . $row[5] . '</td>
                            <td>' . $row[6] . '</td>
                            <td>' . $row[7] . '</td>
                            <td>' . $row[8] . '</td>
                            <td><a name="" id="" class="btn btn-danger" href="#" role="button" title="Elimina al estudiante seleccionado y no le permite el acceso al sistema">Baja</a></td>
                            ';
            }
            $html .= '</tbody></table>';
            echo $html;
        } else {
            $sqlNot = '<p class="text-center fs-5">No se han encontrado resultados</p>';
            echo $sqlNot;
        }
        break;
    case 2:
        $sql = "SELECT us.`dni`, us.`nombre`, us.`apellido`, us.`correo`, us.`domicilio`, us.`fechaNac`, us.`celular`, carr.`nombre`, s.`nombre`
                FROM usuario AS us, usuario_carrera AS uc, carrera AS carr, sede AS s, usuario_sede AS usede, estudiante AS es
                WHERE us.dni = es.dniUsuario AND es.idAnioCursado3 = '$anio'
                AND us.`dni` = uc.`dniUsuario3` AND uc.`codigoCarrera` = carr.`codigo`
                AND us.`dni` = usede.dniUsuario4 AND usede.codigoSede3 = s.`codigo`
                AND us.nombre LIKE '$busquedaInput%'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $html .= '<tr>
                            <td>' . $row[0] . '</td>
                            <td>' . $row[1] . '</td>
                            <td>' . $row[2] . '</td>
                            <td>' . $row[3] . '</td>
                            <td>' . $row[4] . '</td>
                            <td>' . $row[5] . '</td>
                            <td>' . $row[6] . '</td>
                            <td>' . $row[7] . '</td>
                            <td>' . $row[8] . '</td>
                            <td><a name="" id="" class="btn btn-danger" href="#" role="button" title="Elimina al estudiante seleccionado y no le permite el acceso al sistema">Baja</a></td>
                            ';
            }
            $html .= '</tbody></table>';
            echo $html;
        } else {
            $sqlNot = '<p class="text-center fs-5">No se han encontrado resultados</p>';
            echo $sqlNot;
        }
        break;
    case 3:
        $sql = "SELECT us.`dni`, us.`nombre`, us.`apellido`, us.`correo`, us.`domicilio`, us.`fechaNac`, us.`celular`, carr.`nombre`, s.`nombre`
                FROM usuario AS us, usuario_carrera AS uc, carrera AS carr, sede AS s, usuario_sede AS usede, estudiante AS es
                WHERE us.dni = es.dniUsuario AND es.idAnioCursado3 = '$anio'
                AND us.`dni` = uc.`dniUsuario3` AND uc.`codigoCarrera` = carr.`codigo`
                AND us.`dni` = usede.dniUsuario4 AND usede.codigoSede3 = s.`codigo`
                AND us.apellido LIKE '$busquedaInput%'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $html .= '<tr>
                            <td>' . $row[0] . '</td>
                            <td>' . $row[1] . '</td>
                            <td>' . $row[2] . '</td>
                            <td>' . $row[3] . '</td>
                            <td>' . $row[4] . '</td>
                            <td>' . $row[5] . '</td>
                            <td>' . $row[6] . '</td>
                            <td>' . $row[7] . '</td>
                            <td>' . $row[8] . '</td>
                            <td><a name="" id="" class="btn btn-danger" href="#" role="button" title="Elimina al estudiante seleccionado y no le permite el acceso al sistema">Baja</a></td>
                            ';
            }
            $html .= '</tbody></table>';
            echo $html;
        } else {
            $sqlNot = '<p class="text-center fs-5">No se han encontrado resultados</p>';
            echo $sqlNot;
        }
        break;
}
