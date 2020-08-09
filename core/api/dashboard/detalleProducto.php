<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/detalleProducto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $dP = new DetalleProducto; // "dp" abreviación de detalle Producto
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ( $dP->setIdProducto( $_POST[ 'idproductoe' ] ) ) {
                    if ($result['dataset'] = $dP->readAllDetalleProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay existencias registrados para este producto.';
                    }
                } else {
                    $result['exception'] = 'Detalle de producto no válido';
                }
                break;
            case 'create':
                $_POST = $dP->validateForm($_POST);
                if ($dP->setIdProducto($_POST['idproductoe'])) {
                    if ($dP->setIdTalla($_POST['talla'])) {
                        if ($dP->readDetalleProducto()) {
                            if ($dP->setExistencia($_POST['cantidad'])) {
                                if ($dP->updateDetalleProducto()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Existencia agregado correctamente';
                                } else {
                                    $result['exception'] = 'Ocurrió un problema al agregar la cantidad';
                                }
                            } else {
                                $result['exception'] = 'Cantidad incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Ocurrió un problema al obtener el detalle del producto';
                        }
                    } else {
                        $result['exception'] = 'Identificador de talla incorrecto';
                    }
                } else {
                    $result['exception'] = 'Identificador de producto incorrecto';
                }
                break;
            case 'readOne':
                if ( $dP->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ($result['dataset'] = $dP->readOneDetalleProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay existencias registrados para este producto.';
                    }
                } else {
                    $result['exception'] = 'Detalle de producto no válido';
                }
                break;
            case 'update':
                
                break;
            case 'delete':
                break;
            default:
                exit('Acción no disponible');
        } 
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
	exit('Recurso denegado');
}
?>