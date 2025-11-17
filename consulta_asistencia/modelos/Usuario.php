<?php
// incluir la conexion de base de datos
require "../config/conexion.php";

class Usuario
{
    public function __construct()
    {
    }

    // insertar registro SIN imagen
    public function insertar($nombre, $apellidos, $login, $email, $clavehash)
    {
        $sql = "INSERT INTO usuarios (nombre,apellidos,login,email,password,estado) 
                VALUES ('$nombre','$apellidos','$login','$email','$clavehash','1')";
        return ejecutarConsulta($sql);
    }

    // editar registro SIN imagen
    public function editar($idusuario, $nombre, $apellidos, $login, $email, $clavehash)
    {
        if (empty($clavehash)) {
            $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', login='$login', 
                    email='$email' 
                    WHERE id='$idusuario'";
        } else {
            $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', login='$login', 
                    email='$email', password='$clavehash'
                    WHERE id='$idusuario'";
        }
        return ejecutarConsulta($sql);
    }

    public function desactivar($idusuario)
    {
        $sql = "UPDATE usuarios SET estado='0' WHERE id='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function activar($idusuario)
    {
        $sql = "UPDATE usuarios SET estado='1' WHERE id='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idusuario)
    {
        $sql = "SELECT * FROM usuarios WHERE id='$idusuario'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuarios";
        return ejecutarConsulta($sql);
    }

    public function cantidad_usuario()
    {
        $sql = "SELECT count(*) nombre FROM usuarios";
        return ejecutarConsulta($sql);
    }

    public function verificar($login, $clave)
    {
        $sql = "SELECT * FROM usuarios WHERE login='$login' AND password='$clave' AND estado='1'";
        return ejecutarConsulta($sql);
    }
}
