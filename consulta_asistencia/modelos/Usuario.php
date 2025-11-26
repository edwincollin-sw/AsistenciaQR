<?php 
// Incluimos la conexión
require "../config/Conexion.php";

class Usuario {

    // Constructor vacío
    public function __construct() { }

    /* =========================================================================
       INSERTAR USUARIO
    ==========================================================================*/
    public function insertar($nombre, $apellidos, $login, $email, $clavehash) {
        $sql = "INSERT INTO usuarios(nombre, apellidos, login, email, password, estado)
                VALUES ('$nombre', '$apellidos', '$login', '$email', '$clavehash', '1')";
        return ejecutarConsulta($sql);
    }

    /* =========================================================================
       EDITAR USUARIO
    ==========================================================================*/
    public function editar($idusuario, $nombre, $apellidos, $login, $email, $clavehash) {

        // Si la contraseña viene vacía, no cambiarla
        if ($clavehash != "") {
            $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', login='$login', 
                    email='$email', password='$clavehash'
                    WHERE id='$idusuario'";
        } else {
            $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', login='$login', 
                    email='$email'
                    WHERE id='$idusuario'";
        }

        return ejecutarConsulta($sql);
    }

    /* =========================================================================
       DESACTIVAR USUARIO
    ==========================================================================*/
    public function desactivar($idusuario) {
        $sql = "UPDATE usuarios SET estado='0' WHERE id='$idusuario'";
        return ejecutarConsulta($sql);
    }

    /* =========================================================================
       ACTIVAR USUARIO
    ==========================================================================*/
    public function activar($idusuario) {
        $sql = "UPDATE usuarios SET estado='1' WHERE id='$idusuario'";
        return ejecutarConsulta($sql);
    }

    /* =========================================================================
       MOSTRAR UN USUARIO
    ==========================================================================*/
    public function mostrar($idusuario) {
        $sql = "SELECT * FROM usuarios WHERE id='$idusuario'";
        return ejecutarConsultaSimpleFila($sql);
    }

    /* =========================================================================
       LISTAR USUARIOS
    ==========================================================================*/
    public function listar() {
        $sql = "SELECT * FROM usuarios";
        return ejecutarConsulta($sql);
    }

    /* =========================================================================
       VERIFICAR LOGIN
       IMPORTANTE: Este método es el que usa el login.js
    ==========================================================================*/
    public function verificar($login, $clavehash) {

        $sql = "SELECT id, nombre, login, email, estado 
                FROM usuarios 
                WHERE login='$login' 
                AND password='$clavehash' 
                AND estado='1' 
                LIMIT 1";

        return ejecutarConsulta($sql);
    }

}
?>
