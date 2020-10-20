<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/orden.php');
require_once('../../models/direccion.php');

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
$compra = new Orden;
$direccion = new Direccion;
// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
$result = array('status' => 0, 'message' => null, 'exception' => null);
$method = $_SERVER['REQUEST_METHOD'];
// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if( $method == 'POST' || $method == 'GET' ){
    //Decodifica un string de JSON
    $objArray = json_decode(file_get_contents('php://input'), true);
    $objArray = $compra->validateForm( $objArray );
                
    switch ($_REQUEST['action']) {
        case 'createDetail':
            if ($compra->setIdCliente($objArray['idcliente'])) {
                if ($compra->readCompra()) {
                    if ($compra->setIdProducto($objArray['idproducto'])) {
                        if ($compra->setCantidad($objArray['cantidad'])) {
                            if ($compra->setPrecio($objArray['precio'])) {
                                if ($compra->setIdTalla($objArray['talla'])) {
                                    if ($compra->createDetail()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Producto agregado correctamente';
                                    } else {
                                        $result['exception'] = 'Ocurrió un problema al agregar el producto';
                                    }
                                } else {
                                    $result['exception'] = 'Debes seleccionar una talla';
                                }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al obtener el pedido';
                }
            } else {
                $result['exception'] = 'Cliente incorrecto';
            }
            break;
        case 'readCart':
            if ($compra->setIdCliente($objArray['idcliente'])) {
                if ($compra->readCompra()) {
                    if ($result['dataset'] = $compra->readCart()) {
                        $result['status'] = 1;
                        $_SESSION['idcompra'] = $compra->getIdCompra();
                    } else {
                        $result['exception'] = 'No tiene productos en su pedido';
                    }
                } else {
                    $result['exception'] = 'Debe agregar un producto al pedido';
                }
            } else {
                $result['exception'] = 'Cliente incorrecto';
            }
            break;
        case 'readCompraDetail':
            if ( $compra->setIdCompra( $objArray['idcompra'] ) ) {
                if ( $result[ 'dataset' ] = $compra->readCompraDetail() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Compra no existente';
                }
            } else {
                $result['exception'] = 'Identificador no válido';
            }
            break;
        case 'updateDetail':
            if ($compra->setIdCompra($objArray['idcompra'])) {
                if ($compra->setIdDetalleCompra($objArray['iddetallecompra'])) {
                    if ($compra->setCantidad($objArray['cantidad'])) {
                        if ($compra->setIdTalla($objArray['talla'])) {
                            if ($compra->updateDetail()) {
                                $result['status'] = 1;
                                $result['message'] = 'Detalle modificada correctamente';
                            } else {
                                $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                            }
                        } else {
                            $result['exception'] = 'Talla incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
            } else {
                $result['exception'] = 'Pedido incorrecto';
            }
            break;
        case 'deleteDetail':
            if ($compra->setIdCompra($objArray['idcompra'])) {
                if ($compra->setIdDetalleCompra($objArray['iddetallecompra'])) {
                    if ($compra->deleteDetail()) {
                        $result['status'] = 1;
                        $result['message'] = 'Producto removido correctamente';
                    } else {
                        $result['exception'] = 'Ocurrió un problema al remover el producto';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
            } else {
                $result['exception'] = 'Pedido incorrecto';
            }
            break;
        case 'updateStatus':
            if ($compra->setIdCompra($objArray['idcompra'])) {
                if ($compra->setEstado(2)) {
                    if ($compra->updateOrderStatus()) {
                        $result['status'] = 1;
                        $result['message'] = 'Estado actualizado correctamente';
                    } else {
                        $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
            } else {
                $result['exception'] = 'Compra incorrecto';
            }
            break;
        case 'finishOrder':
            if ($compra->setIdCompra($objArray['idcompra'])) {
                if ($compra->setEstado(2)) {
                    if ( $compra->setIdDireccion( $objArray['direccion'] ) ) {
                        if ($compra->finishOrder()) {
                            $result['status'] = 1;
                            $result['message'] = 'Compra finalizado correctamente';
                        } else {
                            $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                        }
                    } else {
                        $result['exception'] = 'Dirección incorrecta';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
            } else {
                $result['exception'] = 'Compra incorrecto';
            }
            break;
        case 'readDirecciones':
            if ( $direccion->setIdCliente( $objArray[ 'idcliente' ] ) ) {
                if ($result['dataset'] = $direccion->readDireccionesCliente()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay direcciones registradas de este cliente';
                }
            } else {
                $result['exception'] = 'Cliente no válido';
            }
            break;
        case 'orderList':
            if ($compra->setIdCliente($objArray['idcliente'])) {
                if ($result['dataset'] = $compra->readOrdenesCliente()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay órdenes registradas para este cliente';
                }
                break;
            } else {
                $result['exception'] = 'Cliente incorrecto';
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