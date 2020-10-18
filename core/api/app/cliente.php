<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/cliente.php');
require_once('../../models/direccion.php');
require_once('../../helpers/mail.php');

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

// Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
session_start();
// Se instancia la clase correspondiente.
$cliente = new Cliente;
$direccion = new Direccion;
$mail = new Mail;
// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
$result = array('status' => 0, 'message' => null, 'exception' => null);
$method = $_SERVER['REQUEST_METHOD'];
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if( $method == 'POST' || $method == 'GET' ){
    //Decodifica un string de JSON
    $objArray = json_decode(file_get_contents('php://input'), true);
    switch ($_REQUEST['action']) {
        case 'logout':
            $objArray = $cliente->validateForm( $objArray );
            if ($cliente->setEstado(0)) {
                if ($cliente->setIdCliente($objArray['idcliente'])) {
                    if ($cliente->updateEstado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Sesión cerrada con exito';
                    } else {
                        $result['exception'] = 'Ocurrió un problema al cerrar la sesión en el servidor';
                    }
                } else {
                    $result['exception'] = 'Identificador del cliente inválido';
                }
            } else {
                $result['exception'] = 'Estado inválido';
            }
            break;
        case 'login':
            $objArray = $cliente->validateForm( $objArray );
            if ( $cliente->setEmail($objArray['email']) ) {
                if ( $cliente->checkEmail( $objArray['email'] )) {
                    if ( $cliente->checkEstado( $objArray['email'] ) ) {
                        if ( $cliente->checkClave( $objArray['clave'] ) ) {
                            if ($result['dataset'] = $cliente->readOneCliente()) {
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                $result['exception'] = 'Cliente inexistente';
                            }
                        } else {
                            $result['exception'] = 'Contraseña incorrecta';
                        }
                    } else {
                        $result['exception'] = $cliente->getEstadoError();
                    }
                } else {
                    $result['exception'] = 'Correo electrónico incorrecto';
                }
            } else {
                $result['exception'] = 'Asegurate de ingresar tus datos para iniciar sesión';
            }               
            break;
        default:
            exit('Acceso no disponible');
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
   header('content-type: application/json; charset=utf-8');
   // Se imprime el resultado en formato JSON y se retorna al controlador.
   print(json_encode($result));
}
else {
   exit('Recurso denegado');
}
?>