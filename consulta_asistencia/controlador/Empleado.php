<?php 
require_once "../modelos/Empleado.php"; // Se incluye el archivo que contiene la clase Empleado

$empleado = new Empleado(); // Se instancia un objeto de la clase Empleado

// Se obtienen los datos del formulario y se limpian para evitar inyección de código
$empleado_id      = isset($_POST["empleado_id"]) ? limpiarCadena($_POST["empleado_id"]) : "";
$nombre           = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$apellidos        = isset($_POST["apellidos"]) ? limpiarCadena($_POST["apellidos"]) : "";
$documento_numero = isset($_POST["documento_numero"]) ? limpiarCadena($_POST["documento_numero"]) : "";
$telefono         = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$codigo           = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";

// Se ejecuta un switch para determinar la acción a realizar según el parámetro 'op'
switch ($_GET["op"]) {

    /* ---------------------------------------------------
       GUARDAR O EDITAR
    --------------------------------------------------- */
    case 'guardaryeditar':
        if (empty($empleado_id)) {
            $rspta = $empleado->insertar($nombre, $apellidos, $documento_numero, $telefono, $codigo);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            $rspta = $empleado->editar($empleado_id, $nombre, $apellidos, $documento_numero, $telefono, $codigo);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    /* ---------------------------------------------------
       MOSTRAR
    --------------------------------------------------- */
    case 'mostrar':
        $rspta = $empleado->mostrar($empleado_id);
        echo json_encode($rspta);
        break;

    /* ---------------------------------------------------
       LISTAR
    --------------------------------------------------- */
    case 'listar':
        $rspta = $empleado->listar();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->apellidos,
                "3" => $reg->documento_numero,
                "4" => $reg->telefono,
                "5" => $reg->codigo
            );
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;

    /* ---------------------------------------------------
       SELECT EMPLEADO
    --------------------------------------------------- */
    case 'select_empleado':
        $rspta = $empleado->listar();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="' . $reg->id . '">' . $reg->nombre . ' ' . $reg->apellidos . '</option>';
        }
        break;
}
?>
