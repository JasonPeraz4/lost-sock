<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/producto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Producto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['idadministrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAllProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'create':
                $_POST = $producto->validateForm( $_POST );
                if ( $producto->setNombre( $_POST[ 'nombre' ] ) ) {
                    if ( $producto->setDescripcion( $_POST[ 'descripcion' ] ) ) {
                        if ( $producto->setPrecio( $_POST[ 'precio' ] ) ) {
                            if ( $producto->setDescuento( $_POST[ 'descuento' ] ) ) {
                                if ( $producto->setIdCategoria( $_POST[ 'categoria_producto' ] ) ) {
                                    if ( $producto->setIdTipoProducto( $_POST[ 'tipo_producto' ] ) ) {
                                        if ( $producto->createProducto() ) {
                                            $result['status'] = 1;
                                                $result['message'] = 'Producto agregado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Tipo seleccionado no válido';
                                    }
                                } else {
                                    $result['exception'] = 'Categoría seleccionada no válida';
                                }
                            } else {
                                $result['exception'] = 'Descuento ingresado no válido';
                            }
                        } else {
                            $result['exception'] = 'Precio ingresado no válido';
                        }
                    } else {
                        $result['exception'] = 'Descripción ingresada no válida';
                    }
                } else {
                    $result['exception'] = 'Nombres ingresados no válidos';
                }
                break;
            case 'readOne':
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ( $result[ 'dataset' ] = $producto->readProducto() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto no existente';
                    }
                } else {
                    $result['exception'] = 'Producto no válido';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm( $_POST );
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ( $data = $producto->readProducto() ) {
                        if ( $producto->setNombre( $_POST[ 'nombre' ] ) ) {
                            if ( $producto->setDescripcion( $_POST[ 'descripcion' ] ) ) {
                                if ( $producto->setPrecio( $_POST[ 'precio' ] ) ) {
                                    if ( $producto->setDescuento( $_POST[ 'descuento' ] ) ) {
                                        if ( $producto->setIdCategoria( $_POST[ 'categoria_producto' ] ) ) {
                                            if ( $producto->setIdTipoProducto( $_POST[ 'tipo_producto' ] ) ) {
                                                if ( $producto->updateProducto() ) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto actualizado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Tipo seleccionado no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Categoría seleccionada no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Descuento ingresado no válido';
                                    }
                                } else {
                                    $result['exception'] = 'Precio ingresado no válido';
                                }
                            } else {
                                $result['exception'] = 'Descripción ingresada no válida';
                            }
                        } else {
                            $result['exception'] = 'Nombres ingresados no válidos';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
                break;
            case 'delete':
                if ( $producto->setIdProducto( $_POST[ 'idproducto' ] ) ) {
                    if ( $data = $producto->readProducto() ) {
                        if ( $producto->deleteProducto() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Producto eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
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