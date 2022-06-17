<?php

require('m_conexion.php');
class Consultas extends Conexion
{

    public function autenticar($usuario, $password)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT usuario, contraseña FROM usuario WHERE usuario = '$usuario' AND contraseña = '$password' AND idRol IS NOT NULL";
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function registrarUsuario($dni, $nombre, $apellido, $departamento, $email, $celular, $username, $password)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT into usuario(dni, nombre, apellido, correo, celular, usuario, contraseña, codPostal2)
                    values('$dni', '$nombre', '$apellido', '$email', '$celular', '$username', '$password', '$departamento')";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function verificarDniUsuario($usuario)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni from usuario u where u.usuario = '$usuario'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_row($result)) {
                $dni = $row[0];
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $dni;
    }

    public function verificarTipoUser($usuario)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT id FROM rolusuario r WHERE id IN (SELECT idRol FROM usuario WHERE usuario = '$usuario')";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_row($result)) {
                $id = $row[0];
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $id;
    }

    public function mostrarNombreApellido($usuario)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT concat(nombre, ' ', apellido) FROM usuario WHERE usuario = '$usuario'";
            $result = mysqli_query($link, $sql);
            while ($col = mysqli_fetch_row($result)) {
                $listDatos = $col[0];
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $listDatos;
    }

    public function mostrarNombreApellidoDni($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT concat(nombre, ' ', apellido) FROM usuario WHERE dni = '$dni'";
            $result = mysqli_query($link, $sql);
            while ($col = mysqli_fetch_row($result)) {
                $listDatos = $col[0];
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $listDatos;
    }

    public function verificarSedePreceptor($user)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT s.codigo, s.nombre, u.usuario from sede s, usuario u, usuario_sede us
                    where s.codigo = us.codigoSede3 and us.dniUsuario4 = u.dni and u.idRol = 2 and u.usuario = '$user'";
            $result = mysqli_query($link, $sql);
            while ($col = mysqli_fetch_row($result)) {
                $sedePreceptorActual = $col[0];
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $sedePreceptorActual;
    }

    //FECHA ACTUAL
    public function fechaActual()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT CURDATE()";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_row($result)) {
                $fechaActual = $row[0];
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $fechaActual;
    }


    //DATOS PERSONALES
    public function listarInfoUsuario($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.nombre, u.apellido, u.domicilio, d.codPostal, d.nombre, u.codigoPostal, u.lugarNac, u.fechaNac, u.celular, u.correo, u.usuario 
                    from usuario u, departamentos d
                    where u.codPostal2 = d.codPostal and u.dni = '$dni'";
            $result = mysqli_query($link, $sql);
            $infoUsuario = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $infoUsuario[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $infoUsuario;
    }

    public function modificarDatosPersonales($nombre, $apellido, $domicilio, $codPostalDep, $codPostal, $lugarNac, $fechaNac, $celular, $correo, $username, $pass, $dni)
    {
        try {
            if ($pass == '' || $pass == null) {
                $sql = "UPDATE usuario set nombre = '$nombre', apellido = '$apellido', domicilio = '$domicilio', codPostal2 = '$codPostalDep', codigoPostal = '$codPostal', 
                    lugarNac = '$lugarNac', fechaNac = '$fechaNac', celular = '$celular', correo = '$correo', usuario = '$username' where dni = '$dni'";
            } else {
                $sql = "UPDATE usuario set nombre = '$nombre', apellido = '$apellido', domicilio = '$domicilio', codPostal2 = '$codPostalDep', codigoPostal = '$codPostal', 
                    lugarNac = '$lugarNac', fechaNac = '$fechaNac', celular = '$celular', correo = '$correo', usuario = '$username', contraseña = '$pass' where dni = '$dni'";
            }

            $link = parent::Conexion();
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ADMIN
    //PAGE agregarUsuario
    public function listarTipoUsuarios()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT * FROM rolusuario";
            $result = mysqli_query($link, $sql);
            $listRoles = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listRoles[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listRoles;
    }

    public function listarDepartamentos()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT * FROM departamentos";
            $result = mysqli_query($link, $sql);
            $listDepartamentos = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listDepartamentos[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listDepartamentos;
    }

    public function listarSedes()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT * FROM sede";
            $result = mysqli_query($link, $sql);
            $listSedes = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listSedes[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listSedes;
    }

    public function listarCarrera()
    {
        $listCarrera = [];
        $link = parent::Conexion();
        $sql = "SELECT * FROM carrera";
        $result = mysqli_query($link, $sql);
        $i = 0;
        while ($col = mysqli_fetch_row($result)) {
            $listCarrera[$i] = $col;
            $i++;
        }
        return $listCarrera;
    }

    public function listarAnioCursado()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT * FROM anioCursado";
            $result = mysqli_query($link, $sql);
            $listAnios = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listAnios[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listAnios;
    }

    public function agregarUsuario(
        $dni,
        $nombre,
        $apellido,
        $correo,
        $usuario,
        $contraseña,
        $domicilio,
        $codigoPostal,
        $departamento,
        $lugarNac,
        $fechaNac,
        $celular,
        $idRol
    ) {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO usuario(dni, nombre, apellido, correo, usuario, contraseña, domicilio, codigoPostal, lugarNac, fechaNac, celular, idRol, codPostal2) 
                    VALUES ('$dni', '$nombre', '$apellido', '$correo', '$usuario', '$contraseña', '$domicilio', '$codigoPostal', '$lugarNac', '$fechaNac', '$celular', '$idRol', '$departamento')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function asignarEstudiante($dni, $anio)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO estudiante(dni, idAnioCursado3) VALUES ('$dni', '$anio')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function asignarCarreraUsuario($dni, $codCarrera)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO usuario_carrera(dniUsuario3, codigoCarrera) VALUES ('$dni', '$codCarrera')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function asignarSedeUsuario($dni, $codSede)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO usuario_sede(dniUsuario4, codigoSede3) VALUES('$dni', '$codSede')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function asignarCalificacionesEstudiante($dni, $codMateria)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO calificaciones(dniEstudiante2, codigoMateria2, fechaInscripto) VALUES ('$dni', '$codMateria', NOW())";
            $result = mysqli_query($link, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ESTUDIANTE
    public function agregarInscripcion($dni, $apellido, $nombre, $fechaNac, $lugarNac, $domicilio, $codPostal, $celular, $correo, $materias, $codCarrera, $codSede, $anioCursado)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO inscripcion(dni, apellidos, nombres, fechaNac, lugarNac, domicilio, codPostal, celular, correo, fechaInscripcion, materias, codigoCarrera4, codigoSede2, idAnioCursado2, anioInscripto) 
                    VALUES('$dni', '$apellido', '$nombre', '$fechaNac', '$lugarNac', '$domicilio', '$codPostal', '$celular', '$correo', CURDATE(), '$materias', '$codCarrera', '$codSede', '$anioCursado', YEAR(CURDATE()))";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function anioActual(){
        try {
            $link = parent::Conexion();
            $sql = "SELECT YEAR(CURDATE())";
            $result = mysqli_query($link, $sql);
            while ($col = mysqli_fetch_row($result)) {
                $anioActual = $col[0];
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $anioActual;
    }

    //Comprobar si ya se ha inscripto
    public function comprobarInscripcionExistente($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT MAX(anioInscripto) FROM inscripcion WHERE dni = '$dni'";
            $result = mysqli_query($link, $sql);
            while ($col = mysqli_fetch_row($result)) {
                $anioInscripto = $col[0];
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $anioInscripto;
    }

    //PAGE LISTARESTUDIANTES
    public function verificarCarrerasSedePreceptor($usuario)
    {
        try {
            $listPreceptorSedes = [];
            $link = parent::Conexion();
            $sql = "SELECT c.codigo, c.nombre, u.usuario, s.nombre from sede s, sede_carrera sc, carrera c, usuario u, usuario_sede us
                    where s.codigo = sc.codigoSede and sc.codigoCarrera3 = c.codigo
                    and s.codigo = us.codigoSede3 and us.dniUsuario4 = u.dni and u.idRol = 2 and u.usuario = '$usuario'";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $listPreceptorSedes[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $listPreceptorSedes;
    }

    public function listarEstudiantes($anio, $codSede)
    {
        try {
            $listEstudiantes = [];
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.apellido, u.nombre, u.correo, u.celular, c.nombre, concat(s.nombre, ' (', d.nombre, ')') as sede
                    from usuario u, estudiante e, rolusuario r, usuario_carrera uc, carrera c, sede s, usuario_sede us, sede_carrera sc, departamentos d 
                    where u.dni = e.dni and u.idRol = r.id and e.idAnioCursado3 = '$anio' 
                    and u.dni = uc.dniUsuario3 and uc.codigoCarrera = c.codigo 
                    and u.dni = us.dniUsuario4 and us.codigoSede3 = s.codigo 
                    and s.codigo = sc.codigoSede and sc.codigoCarrera3 = c.codigo and s.codigo = '$codSede' 
                    and s.codPostal3 = d.codPostal";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $listEstudiantes[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $listEstudiantes;
    }

    public function informacionEstudiante($dni)
    {
        try {
            $infoEstudiante = [];
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.usuario, u.domicilio, u.codigoPostal, d.nombre, u.lugarNac, u.fechaNac, u.celular,
                    a.anio, c.nombre, CONCAT(s.nombre, ', ', d.nombre)
                    FROM usuario u, departamentos d, estudiante e, usuario_carrera uc, carrera c, usuario_sede us, sede s, aniocursado a 
                    WHERE u.codPostal2 = d.codPostal
                    AND u.dni = '$dni'
                    AND u.dni = e.dni AND e.idAnioCursado3 = a.id
                    AND u.dni = uc.dniUsuario3 AND uc.codigoCarrera = c.codigo
                    AND u.dni = us.dniUsuario4 AND us.codigoSede3 = s.codigo   
                    AND s.codPostal3 = d.codPostal";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $infoEstudiante[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $infoEstudiante;
    }

    public function listarDepartamentoUsuario($dni)
    {
        try {
            $departamentoUsuario = [];
            $link = parent::Conexion();
            $sql = "SELECT * from departamentos d where d.codPostal in (select u.codPostal2 from usuario u where u.dni = '$dni')";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $departamentoUsuario[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $departamentoUsuario;
    }

    public function listarAnioCursadoEstudiante($dni)
    {
        try {
            $anioCursadoEstudiante = [];
            $link = parent::Conexion();
            $sql = "SELECT * from aniocursado a where a.id in (select e.idAnioCursado3 from estudiante e where e.dni 
                    in (select u.dni from usuario u where u.dni = '$dni'))";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $anioCursadoEstudiante[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $anioCursadoEstudiante;
    }

    public function listarCarreraEstudiante($dni)
    {
        try {
            $listCarreraEstudiante = [];
            $link = parent::Conexion();
            $sql = "SELECT * from carrera c where c.codigo in (select uc.codigoCarrera from usuario_carrera uc where uc.dniUsuario3 in
                    (select u.dni from usuario u where dni = '$dni'))";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $listCarreraEstudiante[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $listCarreraEstudiante;
    }

    public function listarMateriasEstudiantes($dni)
    {
        try {
            $listMateriasEstudiante = [];
            $link = parent::Conexion();
            $sql = "SELECT m.codigo, m.nombre from materia m where m.codigo in (select c.codigoMateria2 from calificaciones c where c.dniEstudiante2 in 
                    (select e.dni from estudiante e where e.dni in (select u.dni from usuario u where u.dni = '$dni')))";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $listMateriasEstudiante[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $listMateriasEstudiante;
    }

    //Opcion ver historial academico
    public function listarHistorialAcademico($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT m.nombre, a.anio, c.califParcial, c.califRecuperatorio, c.calificacionParcial2, c.califRecuperatorio2, c.califGlobal, c.califFinal,
                    c.fechaFinal, c.califFinal2, c.fechaFinal2, c.califFinal3, c.fechaFinal3, c.condicionFinal, c.fechaInscripto
                    from usuario u, estudiante e, calificaciones c, materia m, aniocursado a 
                    where u.dni = e.dni and e.dni = c.dniEstudiante2 and c.codigoMateria2 = m.codigo 
                    and m.idAnioCursado = a.id and u.dni = '$dni'";
            $result = mysqli_query($link, $sql);
            $historialAcademico = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $historialAcademico[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $historialAcademico;
    }

    //Baja de Usuarios
    public function bajaUsuario($motivoBaja, $dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE usuario set idRol = null, motivoBaja = '$motivoBaja', fechaBaja = CURDATE() where dni = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    //Calificaciones
    public function listarCalificacionesEstudiante($dni)
    {
        try {
            $listCalifEstudiante = [];
            $link = parent::Conexion();
            $sql = "SELECT m.nombre, c.califParcial, c.califRecuperatorio, c.calificacionParcial2, c.califRecuperatorio2, c.califGlobal, 
                    c.califFinal, c.fechaFinal, c.califFinal2, c.fechaFinal2, c.califFinal3, c.fechaFinal3, c.condicionFinal, m.codigo,
                    c.fechainscripto
                    FROM calificaciones c, materia m, estudiante e, usuario u, aniocursado a 
                    WHERE c.dniEstudiante2 = e.dni AND e.dni = u.dni AND u.dni = '$dni'
                    AND c.codigoMateria2 = m.codigo AND m.idAnioCursado = a.id 
                    AND c.fechaInscripto = (SELECT MAX(c2.fechaInscripto) FROM calificaciones c2)";
            $result = mysqli_query($link, $sql);
            $i = 0;
            while ($col = mysqli_fetch_row($result)) {
                $listCalifEstudiante[$i] = $col;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $listCalifEstudiante;
    }

    public function editarCalificacionesEstudiante($dni, $codMateria, $notaParcial, $notaRecup, $notaParcial2, $notaRecup2, $notaGlobal, $notaFinal, $fechaFinal, $notaFinal2, $fechaFinal2, $notaFinal3, $fechaFinal3, $condicion)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE calificaciones c set c.califParcial = $notaParcial, c.califRecuperatorio = $notaRecup, c.calificacionParcial2 = $notaParcial2, 
                    c.califRecuperatorio2 = $notaRecup2, c.califGlobal = $notaGlobal, c.califFinal = $notaFinal, c.fechaFinal = $fechaFinal, 
                    c.califFinal2 = $notaFinal2, c.fechaFinal2 = $fechaFinal2, c.califFinal3 = $notaFinal3, c.fechaFinal3 = $fechaFinal3, 
                    c.condicionFinal = '$condicion'
                    where c.dniEstudiante2 = '$dni' and c.codigoMateria2 = '$codMateria'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //SOLICITUD ALTA
    public function listarSolicitudAlta()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.celular, u.usuario from usuario u 
                    where u.idRol is null";
            $result = mysqli_query($link, $sql);
            $listSolicitudAlta = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listSolicitudAlta[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $listSolicitudAlta;
    }

    public function altaUsuarioEstudiante($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE usuario set idRol = 1 where dni = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function altaEstudiante($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT into estudiante(dni) values('$dni')";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function eliminarSolicitud($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "DELETE from usuario where dni = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    //LISTAR INSCRIPCIONES
    public function listarInscripciones($anio, $sedeActual)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT i.id, i.dni, i.apellidos, i.nombres, i.fechaNac, i.lugarNac, i.domicilio, i.codPostal, i.celular, i.correo, 
                    i.fechaInscripcion, i.materias, c.nombre, s.nombre, i.idAnioCursado2 from inscripcion i, carrera c, sede s 
                    where i.codigoCarrera4 = c.codigo and i.codigoSede2 = s.codigo and i.idAnioCursado2 = '$anio' and i.codigoSede2 = '$sedeActual'";
            $result = mysqli_query($link, $sql);
            $listInscripcion = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listInscripcion[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listInscripcion;
    }

    public function listarInscripcionEstudiante($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT i.id, i.dni, i.apellidos, i.nombres, i.fechaNac, i.lugarNac, i.domicilio, i.codPostal, i.celular, i.correo, 
                    i.fechaInscripcion, i.materias, c.nombre, concat(s.nombre, ', ', d.nombre) as sede, i.idAnioCursado2 
                    FROM inscripcion i, carrera c, sede s, departamentos d 
                    WHERE i.codigoCarrera4 = c.codigo AND i.codigoSede2 = s.codigo and s.codPostal3 = d.codPostal and i.dni = '$dni'";
            $result = mysqli_query($link, $sql);
            $listInscripcionEstudiante = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listInscripcionEstudiante[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listInscripcionEstudiante;
    }

    //SELECT2 - PAGE INSCRIBIR ESTUDIANTE
    public function listarEstudiantesCargados()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.celular from usuario u 
                    where u.idRol in (select r.id from rolusuario r where r.id = 1) and u.dni in (select e.dni from estudiante e where e.dni = u.dni)";
            $result = mysqli_query($link, $sql);
            $listEstudiantes = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listEstudiantes[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listEstudiantes;
    }


    //asignarEstudianteAnio
    public function asignarAnioEstudiante($dni, $anio)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE estudiante set idAnioCursado3 = '$anio' where dni = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function asignarCarreraEstudiante($dni, $codCarrera)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE usuario_carrera set codigoCarrera = '$codCarrera' where dniUsuario3 = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function asignarSedeEstudiante($dni, $codSede)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE usuario_sede set codigoSede3 = '$codSede' where dniUsuario4 = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    //Comprobar fecha Inscripcion a materias
    public function comprobarFechaInscripcionMaterias($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT m.nombre, c.fechainscripto
                    FROM calificaciones c, materia m, estudiante e, usuario u, aniocursado a 
                    WHERE c.dniEstudiante2 = e.dni AND e.dni = u.dni AND u.dni = '$dni'
                    AND c.codigoMateria2 = m.codigo AND m.idAnioCursado = a.id AND c.fechaInscripto = (SELECT MAX(c2.fechaInscripto) FROM calificaciones c2)";
            $result = mysqli_query($link, $sql);
            $fechaInscripcionMateria = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $fechaInscripcionMateria[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $fechaInscripcionMateria;
    }

    //SECCION LISTA BAJAS
    public function listarBajas()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni, concat(u.nombre, ' ', u.apellido), u.correo, u.celular, c.nombre, s.nombre, u.fechaBaja, u.motivoBaja
                    from usuario u, carrera c, usuario_carrera uc, sede s, usuario_sede us
                    where u.dni = uc.dniUsuario3 and uc.codigoCarrera = c.codigo
                    and u.dni = us.dniUsuario4 and us.codigoSede3 = s.codigo
                    and u.idRol is null";
            $result = mysqli_query($link, $sql);
            $listBajas = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listBajas[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listBajas;
    }



    //---------------------------------------ADMIN----------------------------------------------//
    public function listarEstudiantesAdmin($anio)
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.celular, c.nombre, concat(s.nombre, ', ', d.nombre), a.anio 
                    from usuario u, rolusuario r, estudiante e, usuario_carrera uc, carrera c, usuario_sede us, sede s, departamentos d, aniocursado a
                    where u.idRol = r.id and u.idRol = 1
                    and u.dni = e.dni and u.dni = uc.dniUsuario3 and uc.codigoCarrera = c.codigo
                    and u.dni = us.dniUsuario4 and us.codigoSede3 = s.codigo and s.codPostal3 = d.codPostal
                    and e.idAnioCursado3 = a.id and a.id = '$anio'";
            $result = mysqli_query($link, $sql);
            $estudiantesAdmin = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $estudiantesAdmin[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $estudiantesAdmin;
    }

    public function listarPreceptores()
    {
        try {
            $link = parent::Conexion();
            $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.celular, concat(s.nombre, ', ', d.nombre), u.idRol
                    from usuario u, rolusuario r, usuario_sede us, sede s, departamentos d
                    where u.idRol = r.id and u.idRol = 2
                    and u.dni = us.dniUsuario4 and us.codigoSede3 = s.codigo and s.codPostal3 = d.codPostal";
            $result = mysqli_query($link, $sql);
            $listPreceptores = [];
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
                $listPreceptores[$i] = $row;
                $i++;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        return $listPreceptores;
    }
}
