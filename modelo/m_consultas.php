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
            if ($result == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
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
            $listDatos = array();
            $sql = "SELECT id_usuario, nombre, apellido FROM usuario WHERE usuario = '$usuario'";
            $result = mysqli_query($link, $sql);
            while ($col = mysqli_fetch_row($result)) {
                $listDatos = [
                    'nombre' => $col[1],
                    'apellido' => $col[2]
                ];
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
            $sql = "INSERT INTO usuario 
                    VALUES ('$dni', '$nombre', '$apellido', '$correo', '$usuario', '$contraseña', 
                    '$domicilio', '$codigoPostal', '$lugarNac', '$fechaNac', '$celular', '$idRol', '$departamento')";
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
            $sql = "INSERT INTO calificaciones(dniEstudiante2, codigoMateria2) VALUES ('$dni', '$codMateria')";
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



    public function altaEstudiante($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "UPDATE usuario SET idRol = 1 WHERE dni = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == false) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function bajaEstudiante($dni)
    {
        try {
            $link = parent::Conexion();
            $sql = "DELETE FROM usuario WHERE dni = '$dni'";
            $result = mysqli_query($link, $sql);
            if ($result == false) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    //PAGE LISTARESTUDIANTES
    public function verificarCarrerasSedePreceptor($usuario)
    {
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
        return $listPreceptorSedes;
    }

    public function listarEstudiantes($anio, $codSede)
    {
        $listEstudiantes = [];
        $link = parent::Conexion();
        $sql = "SELECT u.dni, concat(u.nombre, ' ', u.apellido) as nombre_apellido, u.correo, u.domicilio, u.fechaNac, u.celular, c.nombre, concat(s.nombre, ' (', d.nombre, ')') as sede
                from usuario u, estudiante e, usuario_carrera uc, carrera c, sede s, usuario_sede us, sede_carrera sc, departamentos d 
                where u.dni = e.dni and e.idAnioCursado3 = '$anio' 
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
        return $listEstudiantes;
    }

    public function listarEstudiantesNoAsignados()
    {
        $listEstudiantesNA = [];
        $link = parent::Conexion();
        $sql = "SELECT dni, CONCAT(dni, ', ', nombre, ' ', apellido, ', ', correo, ', ', celular) AS datos FROM usuario WHERE idRol = 1 AND
                dni NOT IN (SELECT dniUsuario FROM estudiante)";
        $result = mysqli_query($link, $sql);
        $i = 0;
        while ($col = mysqli_fetch_row($result)) {
            $listEstudiantesNA[$i] = $col;
            $i++;
        }
        return $listEstudiantesNA;
    }
}
