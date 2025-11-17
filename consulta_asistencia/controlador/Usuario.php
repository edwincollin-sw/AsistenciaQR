<?php 
// Iniciamos la sesión
session_start();

// Incluimos el archivo de la clase Usuario
require_once "../modelos/Usuario.php";

// Creamos una instancia del objeto Usuario
$usuario = new Usuario();

// Recibimos los datos enviados por el formulario
$idusuario   = isset($_POST["idusuario"]) ? limpiarCadena($_POST["idusuario"]) : "";
$nombre      = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$apellidos   = isset($_POST["apellidos"]) ? limpiarCadena($_POST["apellidos"]) : "";
$login       = isset($_POST["login"]) ? limpiarCadena($_POST["login"]) : "";
$email       = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";
$password    = isset($_POST["clave"]) ? limpiarCadena($_POST["clave"]) : "";
$imagen      = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";

// Dependiendo de la operación solicitada mediante la variable $_GET["op"]
switch ($_GET["op"]) {

    case 'guardaryeditar':

        // Inicializamos la variable que contendrá el hash de la contraseña
        $clavehash = "";

        // Verificamos si se ha subido una nueva imagen
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            // Si no se ha subido una nueva imagen, conservamos la imagen actual
            $imagen = $_POST["imagenactual"];
        } else {
            // Si se ha subido una nueva imagen, la movemos al directorio correspondiente
            $ext = explode(".", $_FILES["imagen"]["name"]);

            if (
                $_FILES['imagen']['type'] == "image/jpg" ||
                $_FILES['imagen']['type'] == "image/jpeg" ||
                $_FILES['imagen']['type'] == "image/png"
            ) {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
            }
        }

        // Si se ha ingresado una nueva contraseña
        if (!empty($password)) {
            // Generamos el hash SHA256 para la contraseña
            $clavehash = hash("SHA256", $password);
        }

        // Verificamos si se está insertando o editando
        if (empty($idusuario)) {
            $rspta = $usuario->insertar($nombre, $apellidos, $login, $email, $clavehash, $imagen);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar todos los datos del usuario";
        } else {
            $rspta = $usuario->editar($idusuario, $nombre, $apellidos, $login, $email, $clavehash, $imagen);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }

        break;

    case 'desactivar':
        $rspta = $usuario->desactivar($idusuario);
        echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;

    case 'activar':
        $rspta = $usuario->activar($idusuario);
        echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;

    case 'mostrar':
        $rspta = $usuario->mostrar($idusuario);
        echo json_encode($rspta);
        break;

    case 'listar':

        $rspta = $usuario->listar();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => ($reg->estado) ?
                    '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>
                     <button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>'
                    :
                    '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>
                     <button class="btn btn-primary btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->apellidos,
                "3" => $reg->login,
                "4" => $reg->email,
                "5" => '<img src="../files/usuarios/'.$reg->imagen.'" height="50px" width="50px">',
                "6" => ($reg->estado) ? 
                    '<span class="label bg-green">Activado</span>' 
                    : 
                    '<span class="label bg-red">Desactivado</span>'
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

    case 'verificar':

        $login = $_POST['logina'];
        $clave = $_POST['clavea'];

        $clavehash = hash("SHA256", $clave);

        $rspta = $usuario->verificar($login, $clavehash);
        $fetch = $rspta->fetch_object();

        if (isset($fetch)) {
            $_SESSION['idusuario'] = $fetch->idusuario;
            $_SESSION['nombre'] = $fetch->nombre;
            $_SESSION['imagen'] = $fetch->imagen;
            $_SESSION['login'] = $fetch->login;
        }

        echo json_encode($fetch);
        break;

    case 'salir':
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        break;
}
?>
