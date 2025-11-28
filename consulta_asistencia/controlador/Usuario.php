<?php
session_start();
require_once "../modelos/Usuario.php";
require_once "../helpers/funciones.php"; // Asegúrate que limpiarCadena() está aquí

$usuario = new Usuario();

$idusuario = isset($_POST["idusuario"]) ? limpiarCadena($_POST["idusuario"]) : "";
$nombre    = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$apellidos = isset($_POST["apellidos"]) ? limpiarCadena($_POST["apellidos"]) : "";
$login     = isset($_POST["login"]) ? limpiarCadena($_POST["login"]) : "";
$email     = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$password  = isset($_POST["clave"]) ? limpiarCadena($_POST["clave"]) : "";

$op = isset($_GET["op"]) ? $_GET["op"] : "";

switch ($op) {

    case 'guardaryeditar':
        $clavehash = "";
        if (!empty($password)) {
            $clavehash = hash("SHA256", $password);
        }

        if (empty($idusuario)) {
            $rspta = $usuario->insertar($nombre, $apellidos, $login, $email, $clavehash);
            echo $rspta ? "Usuario registrado correctamente" : "No se pudo registrar el usuario";
        } else {
            $rspta = $usuario->editar($idusuario, $nombre, $apellidos, $login, $email, $clavehash);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    case 'desactivar':
        $rspta = $usuario->desactivar($idusuario);
        echo $rspta ? "Usuario desactivado" : "No se pudo desactivar";
        break;

    case 'activar':
        $rspta = $usuario->activar($idusuario);
        echo $rspta ? "Usuario activado" : "No se pudo activar";
        break;

    case 'mostrar':
        $rspta = $usuario->mostrar($idusuario);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $usuario->listar();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => ($reg->estado)
                    ? '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>'
                    : '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-primary btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->apellidos,
                "3" => $reg->login,
                "4" => $reg->email,
                "5" => ($reg->estado) ? '<span class="label bg-green">Activo</span>'
                                      : '<span class="label bg-red">Inactivo</span>'
            );
        }

        echo json_encode([
            "data" => $data
        ]);
        break;

    case 'verificar':
        $logina = limpiarCadena($_POST['logina']);
        $clavea = limpiarCadena($_POST['clavea']);
        $clavehash = hash("SHA256", $clavea);

        $rspta = $usuario->verificar($logina, $clavehash);
        $fetch = $rspta->fetch_object();

        if ($fetch) {
            $_SESSION['idusuario'] = $fetch->id;
            $_SESSION['nombre'] = $fetch->nombre;
            $_SESSION['login'] = $fetch->login;
            $_SESSION['email'] = $fetch->email;
            $_SESSION['imagen'] = $fetch->imagen ?? 'default.png';

            echo json_encode(["status" => "ok"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
        break;

    case 'salir':
        session_unset();
        session_destroy();
        header("Location: ../vistas/login.php");
        break;
}
?>
