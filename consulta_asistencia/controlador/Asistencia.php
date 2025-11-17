<?php 
require_once "../modelos/Asistencia.php"; // Se incluye el archivo que contiene la clase Asistencia

$asistencia = new Asistencia(); // Se instancia un objeto de la clase Asistencia

$empleado_id = isset($_POST["empleado_id"]) ? limpiarCadena($_POST["empleado_id"]) : "";

// Se ejecuta un switch para determinar la acción a realizar según el parámetro 'op'
switch ($_GET["op"]) {

    /* ---------------------------------------------------
       LISTAR ASISTENCIAS
    --------------------------------------------------- */
    case 'listar':
        $rspta = $asistencia->listar();
        $data = array();

        $item = 0;
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $item,
                "1" => $reg->codigo,
                "2" => $reg->empleado,
                "3" => $reg->fecha,
                "4" => $reg->hora,
                "5" => ($reg->tipo == 'Entrada') ?
                    '<span class="label bg-green">' . $reg->tipo . '</span>' :
                    '<span class="label bg-orange">' . $reg->tipo . '</span>',
            );
            $item++;
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
       LISTAR ASISTENCIAS POR RANGO DE FECHAS
    --------------------------------------------------- */
    case 'listaasistencia':
        $fecha_inicio = $_REQUEST["fecha_inicio"];
        $fecha_fin    = $_REQUEST["fecha_fin"];
        $empleado_id  = $_REQUEST["empleado_id"];

        $rspta = $asistencia->listar_reporte($fecha_inicio, $fecha_fin, $empleado_id);
        $data = array();

        $item = 0;
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $item,
                "1" => $reg->codigo,
                "2" => $reg->empleado,
                "3" => $reg->fecha,
                "4" => $reg->hora,
                "5" => ($reg->tipo == 'Entrada') ?
                    '<span class="label bg-green">' . $reg->tipo . '</span>' :
                    '<span class="label bg-orange">' . $reg->tipo . '</span>',
            );
            $item++;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}
?>
