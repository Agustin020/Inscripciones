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
            if (mysqli_num_rows($result)) {
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
            $sql = "SELECT id FROM tipousuario WHERE id IN (SELECT id_tipoUsuario FROM usuario WHERE usuario = '$usuario')";
            $result = mysqli_query($link, $sql);
            while ($filas = mysqli_fetch_row($result)) {
                $id = $filas[0];
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

    public function registrarUsuario($username, $nombre, $apellido, $password, $fechaNac, $dni, $domicilio, $celular, $email)
    {
        try {
            $link = parent::Conexion();
            $sql = "INSERT INTO usuario(usuario, nombre, apellido, contraseña, fechaNac, DNI, domicilio, celular, correo)
                    VALUES('$username', '$nombre', '$apellido', '$password', '$fechaNac', '$dni', '$domicilio', '$celular', '$email')";
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

    public function listarRegistros()
    {
        $listRegistros = [];
        $link = parent::Conexion();
        $sql = "SELECT dni, nombre, apellido, correo, domicilio, fechaNac, celular FROM usuario WHERE idRol IS NULL";
        $result = mysqli_query($link, $sql);
        $i = 0;
        while ($col = mysqli_fetch_assoc($result)) {
            $listRegistros[$i] = $col;
            $i++;
        }
        return $listRegistros;
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

    public function listarEstudiantes1ro()
    {
        $listEstudiantes1 = [];
        $link = parent::Conexion();
        $sql = "SELECT us.`dni`, us.`nombre`, us.`apellido`, us.`correo`, us.`domicilio`, us.`fechaNac`, us.`celular`, carr.`nombre`, s.`nombre`
                FROM usuario AS us, usuario_carrera AS uc, carrera AS carr, sede AS s, usuario_sede AS usede, estudiante AS es
                WHERE us.dni = es.dniUsuario AND es.idAnioCursado3 = 1
                AND us.`dni` = uc.`dniUsuario3` AND uc.`codigoCarrera` = carr.`codigo`
                AND us.`dni` = usede.dniUsuario4 AND usede.codigoSede3 = s.`codigo`";
        $result = mysqli_query($link, $sql);
        $i = 0;
        while ($col = mysqli_fetch_row($result)) {
            $listEstudiantes1[$i] = $col;
            $i++;
        }
        return $listEstudiantes1;
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
