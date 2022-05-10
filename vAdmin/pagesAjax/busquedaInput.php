<?php

require('../../modelo/m_conexionPage.php');
$link = conexion();

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
        <th>Nombre y Apellido</th>
        <th>Correo</th>
        <th>Domicilio</th>
        <th>Fecha de nacimiento</th>
        <th>Celular</th>
        <th>Carrera</th>
        <th>Sede</th>
        <th>Accion</th>
    </tr>
</thead>
<tbody>';

switch ($filtroInput) {
    case 1:
        $sql = "SELECT u.dni, CONCAT(u.nombre,' ', u.apellido) AS nombre_apellido, u.correo, u.domicilio, 
                u.fechaNac, u.celular, c.nombre, concat(s.nombre, ' (', d.nombre, ')') as sede
                FROM usuario u, usuario_carrera uc, carrera c, sede s, usuario_sede us, estudiante e, departamentos d 
                WHERE u.dni = uc.dniUsuario3 AND uc.codigoCarrera = c.codigo AND u.idRol = 1
                AND u.dni = us.dniUsuario4 AND us.codigoSede3 = s.codigo
                AND e.idAnioCursado3 = '3' and s.codigo = '4000'
                and d.codPostal = s.codPostal3
                AND u.dni LIKE '$busquedaInput%'
                group by u.dni";
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
        $sql = "SELECT u.dni, CONCAT(u.nombre,' ', u.apellido) AS nombre_apellido, u.correo, u.domicilio, 
                u.fechaNac, u.celular, c.nombre, concat(s.nombre, ' (', d.nombre, ')') as sede
                FROM usuario u, usuario_carrera uc, carrera c, sede s, usuario_sede us, estudiante e, departamentos d 
                WHERE u.dni = uc.dniUsuario3 AND uc.codigoCarrera = c.codigo AND u.idRol = 1
                AND u.dni = us.dniUsuario4 AND us.codigoSede3 = s.codigo
                AND e.idAnioCursado3 = '3' and s.codigo = '4000'
                and d.codPostal = s.codPostal3
                AND u.nombre LIKE '$busquedaInput%'
                group by u.dni";
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
        $sql = "SELECT u.dni, CONCAT(u.nombre,' ', u.apellido) AS nombre_apellido, u.correo, u.domicilio, 
                u.fechaNac, u.celular, c.nombre, concat(s.nombre, ' (', d.nombre, ')') as sede
                FROM usuario u, usuario_carrera uc, carrera c, sede s, usuario_sede us, estudiante e, departamentos d 
                WHERE u.dni = uc.dniUsuario3 AND uc.codigoCarrera = c.codigo AND u.idRol = 1
                AND u.dni = us.dniUsuario4 AND us.codigoSede3 = s.codigo
                AND e.idAnioCursado3 = '3' and s.codigo = '4000'
                and d.codPostal = s.codPostal3
                AND u.apellido LIKE '$busquedaInput%'
                group by u.dni";
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
