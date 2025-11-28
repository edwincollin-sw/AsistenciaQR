<?php
require_once "global.php";

$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conexion->connect_errno) {
    printf("Error de conexión: %s\n", $conexion->connect_error);
    exit();
}
$conexion->set_charset(DB_ENCODE);

// funciones helper
if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql) {
        global $conexion;
        return $conexion->query($sql);
    }

    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        return $query ? $query->fetch_assoc() : null;
    }

    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $conexion->query($sql);
        return $conexion->insert_id;
    }

    function limpiarCadena($str) {
        global $conexion;
        $str = trim($str);
        return htmlspecialchars($conexion->real_escape_string($str), ENT_QUOTES, 'UTF-8');
    }
}
?>
