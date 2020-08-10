<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/orden.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $compra = new Orden;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['idcliente'])) {
        $result['session'] = 1;
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                if ($compra->setIdCliente($_SESSION['idcliente'])) {
                    if ($compra->readCompra()) {
                        $_POST = $compra->validateForm($_POST);
                        if ($compra->setIdProducto($_POST['idproducto'])) {
                            if ($compra->setCantidad($_POST['cantidad'])) {
                                if ($compra->setPrecio($_POST['precio'])) {
                                    if ($compra->setIdTalla($_POST['talla'])) {
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
                if ($compra->setIdCliente($_SESSION['idcliente'])) {
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
                if ( $compra->setIdCompra( $_SESSION['idcompra'] ) ) {
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
                if ($compra->setIdCompra($_SESSION['idcompra'])) {
                    $_POST = $compra->validateForm($_POST);
                    if ($compra->setIdDetalleCompra($_POST['iddetallecompra'])) {
                        if ($compra->setCantidad($_POST['cantidad'])) {
                            if ($compra->setIdTalla($_POST['talla'])) {
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
                if ($compra->setIdCompra($_SESSION['idcompra'])) {
                    if ($compra->setIdDetalleCompra($_POST['iddetallecompra'])) {
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
                if ($compra->setIdCompra($_SESSION['idcompra'])) {
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
                if ($compra->setIdCompra($_SESSION['idcompra'])) {
                    if ($compra->setEstado(2)) {
                        $_POST = $compra->validateForm( $_POST );
                        if ( $compra->setIdDireccion( $_POST['direccion'] ) ) {
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
            default:
                exit('Acción no disponible dentro de la sesión');
        }
    } else {
        // Se compara la acción a realizar cuando un cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
                break;
            default:
                exit('Acción no disponible fuera de la sesión');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>