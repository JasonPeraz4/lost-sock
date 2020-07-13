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
                break;
            case 'create':
                break;
            case 'readOne':
                if ( $direccion->setIdCliente( $_SESSION[ 'idcliente' ] ) ) {
                    if ($result['dataset'] = $direccion->readDireccion()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay direcciones registradas de este cliente';
                    }
                } else {
                    $result['exception'] = 'Cliente no válido';
                }
                break;
            case 'update':
                $_POST = $direccion->validateForm( $_POST );
                if ( $direccion->setIdCliente( $_SESSION[ 'idcliente' ] ) ) {
                    if ( $data = $direccion->readAllDirecciones() ) {
                        foreach ($data as $v1) {
                            foreach ($v1 as $v2) {
                                if ( $direccion->setIdDireccion( $v2 ) ) {
                                    if ( $direccion->setDireccion( $_POST[ $v2 ] ) ) {
                                        if ( $direccion->updateDireccion() ) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Dirección actualizada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección ingresada incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Identificador de la dirección';
                                }
                            }
                        }
                    } else {
                        $result['exception'] = 'Direcciones inexistentes';
                    }
                } else {
                    $result['exception'] = 'Identificador del cliente incorrecto';
                }
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