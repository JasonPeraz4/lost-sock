<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/producto.php');
require_once('../../models/detalleProducto.php');

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
$producto = new Producto;
$dP = new DetalleProducto;
// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
$result = array('status' => 0, 'message' => null, 'exception' => null);
$method = $_SERVER['REQUEST_METHOD'];
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if( $method == 'POST' || $method == 'GET' ){
    //Decodifica un string de JSON
    $objArray = json_decode(file_get_contents('php://input'), true);
    switch ($_REQUEST['action']) {
        case 'readProductosCategoria':
            if ($producto->setIdCategoria($objArray['idcategoria'])) {
                if ($result['dataset'] = $producto->readProductosCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
            } else {
                $result['exception'] = 'Categoría incorrecta';
            }
            break;
        case 'readOne':
            if ($producto->setIdProducto($objArray['idproducto'])) {
                if ($result['dataset'] = $producto->readProductoCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
            } else {
                $result['exception'] = 'Producto incorrecto';
            }
            break;
        case 'readTallas':
            if ( $dP->setIdProducto( $objArray[ 'idproducto' ] ) ) {
                if ($result['dataset'] = $dP->readOneDetalleProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay existencias registrados para este producto.';
                }
            } else {
                $result['exception'] = 'Detalle de producto no válido';
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