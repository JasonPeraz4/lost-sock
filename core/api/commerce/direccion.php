<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/direccion.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $direccion = new Direccion;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['idcliente'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ( $direccion->setIdCliente( $_SESSION[ 'idcliente' ] ) ) {
                    if ($result['dataset'] = $direccion->readAllDirecciones()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay direcciones registradas de este cliente';
                    }
                } else {
                    $result['exception'] = 'Cliente no válido';
                }
                break;
            case 'readAllDepartamentos':
                if ($result['dataset'] = $direccion->readAllDepartamento()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay departamentos registrados';
                }
                break;
            case 'create':
                $_POST = $direccion->validateForm( $_POST );
                if ( $direccion->setIdCliente( $_SESSION[ 'idcliente' ] ) ) {
                    if ( $direccion->setDireccion( $_POST[ 'direccion' ] ) ) {
                        if ( $direccion->setIdDepartamento( $_POST[ 'departamento_direccion' ] ) ) {
                            if ( $direccion->createDireccion() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Dirección agregada correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Departamento selelcionado no válido';
                        }
                    } else {
                        $result['exception'] = 'Dirección no válida';
                    }
                } else {
                    $result['exception'] = 'Identificador del cliente no válido';
                }
                break;
            case 'readOne':
                if ( $direccion->setIdDireccion( $_POST[ 'iddireccion' ] ) ) {
                    if ($result['dataset'] = $direccion->readDireccion()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay direcciones registradas de este cliente';
                    }
                } else {
                    $result['exception'] = 'Identificador de la dirección no válido';
                }
                break;
            case 'update':
                $_POST = $direccion->validateForm( $_POST );
                if ( $direccion->setIdDireccion( $_POST[ 'iddireccion' ] ) ) {
                    if ( $data = $direccion->readDireccion() ) {
                        if ( $direccion->setDireccion( $_POST[ 'direccion' ] ) ) {
                            if ( $direccion->setIdDepartamento( $_POST[ 'departamento_direccion' ] ) ) {
                                if ( $direccion->updateDireccion() ) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Dirección actualizada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Departamento selelcionado no válido';
                            }
                        } else {
                            $result['exception'] = 'Dirección no válida';
                        }
                    } else {
                        $result['exception'] = 'Dirección inexistentes';
                    }
                } else {
                    $result['exception'] = 'Identificador del cliente incorrecto';
                }
                break;
            case 'delete':
                if ( $direccion->setIdDireccion( $_POST[ 'iddireccion' ] ) ) {
                    if ( $data = $direccion->readDireccion() ) {
                        if ( $direccion->deleteDireccion() ) {
                            $result['status'] = 1;
                            $result['message'] = 'Dirección eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                        
                    } else {
                        $result['exception'] = 'Dirección inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador de la identificación incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else {
        switch ($_GET['action']) {
            case 'readAllDepartamentos':
                case 'readAllDepartamentos':
                    if ($result['dataset'] = $direccion->readAllDepartamento()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay departamentos registrados';
                    }
                break;
            default:
                exit('Acceso no disponible');
                break;
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