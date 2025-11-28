<?php
require_once "../config/conexion.php";

class Usuario {

    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function insertar($nombre, $apellidos, $login, $email, $clavehash) {
        $stmt = $this->db->prepare(
            "INSERT INTO usuarios(nombre, apellidos, login, email, password, estado, imagen)
             VALUES (?, ?, ?, ?, ?, 1, 'default.png')"
        );
        $stmt->bind_param("sssss", $nombre, $apellidos, $login, $email, $clavehash);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function editar($idusuario, $nombre, $apellidos, $login, $email, $clavehash = "") {
        if ($clavehash !== "") {
            $stmt = $this->db->prepare(
                "UPDATE usuarios SET nombre=?, apellidos=?, login=?, email=?, password=? WHERE id=?"
            );
            $stmt->bind_param("sssssi", $nombre, $apellidos, $login, $email, $clavehash, $idusuario);
        } else {
            $stmt = $this->db->prepare(
                "UPDATE usuarios SET nombre=?, apellidos=?, login=?, email=? WHERE id=?"
            );
            $stmt->bind_param("ssssi", $nombre, $apellidos, $login, $email, $idusuario);
        }

        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function desactivar($idusuario) {
        $stmt = $this->db->prepare("UPDATE usuarios SET estado=0 WHERE id=?");
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        return true;
    }

    public function activar($idusuario) {
        $stmt = $this->db->prepare("UPDATE usuarios SET estado=1 WHERE id=?");
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        return true;
    }

    public function mostrar($idusuario) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id=? LIMIT 1");
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM usuarios");
    }

    public function verificar($login, $clavehash) {
        $stmt = $this->db->prepare(
            "SELECT id, nombre, login, email, estado, imagen
             FROM usuarios 
             WHERE login=? AND password=? AND estado=1 LIMIT 1"
        );
        $stmt->bind_param("ss", $login, $clavehash);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
