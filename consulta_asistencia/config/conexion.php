<?php
// Incluye el archivo global.php que contiene las constantes de configuración de la base de datos
require_once "global.php";

// Establece la conexión con la base de datos utilizando las constantes definidas en global.php
$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Establece el conjunto de caracteres para la conexión
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

// Comprueba si hay errores en la conexión
if (mysqli_connect_errno()) {
    // Imprime un mensaje de error si la conexión falla y termina el script
    printf("¡Ups parece que falló en la conexión con la base de datos: %s\n", mysqli_connect_error());
    exit();
}

// Verifica si la función ejecutarConsulta no está definida para evitar conflictos de redefinición
if (!function_exists('ejecutarConsulta')) {
    // Define la función ejecutarConsulta que ejecuta consultas SQL y devuelve el resultado
    function ejecutarConsulta($sql) {
        global $conexion;
        // Ejecuta la consulta SQL y devuelve el resultado
        $query = $conexion->query($sql);
        return $query;
    }

    // Define la función ejecutarConsultaSimpleFila que ejecuta consultas SQL y devuelve una fila de resultados
    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        // Ejecuta la consulta SQL y devuelve una fila de resultados
        $query = $conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    // Define la función ejecutarConsulta_retornarID que ejecuta consultas SQL y devuelve el ID insertado
    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        // Ejecuta la consulta SQL y devuelve el ID insertado
        $query = $conexion->query($sql);
        return $conexion->insert_id;
    }

    // Define la función limpiarCadena que limpia una cadena para evitar inyecciones SQL y XSS
    function limpiarCadena($str) {
        global $conexion;
        // Limpia la cadena escapando caracteres especiales y HTML para evitar inyecciones SQL y XSS
        $str = mysqli_real_escape_string($conexion, trim($str));
        return htmlspecialchars($str);
    }
}
?>