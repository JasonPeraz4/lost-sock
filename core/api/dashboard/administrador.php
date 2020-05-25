<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/administrador.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if ( isset( $_GET['action'] ) ) {
    // Se crea una sesión o se reanuda la sesión actual para poder utilizar variables sde sesión en el script.
    session_start();
    // Se intancia la clase correspondiente.
    $administrador = new Administrador;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if ( isset( $_SESSION['idadministrador'] ) ) {
        switch ( $_GET['action'] ){
            case 'logout':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión cerrada con exito';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
            break;
            case 'readAll':
                if ( $administrador->existAdministradores() ) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No existen administradores registrados';
                }
            break;
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ( $_GET['action'] ){
            case 'readAll':
                if ( $administrador->existAdministradores() ) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un administrador registrado';
                } else {
                    $result['exception'] = 'No existen administradores registrados';
                }
            break;
            case 'signin':
                $_POST = $administrador->validateForm( $_POST );
                if ( $administrador->setNombres($_POST['nombres']) ) {
                    if ( $administrador->setApellidos($_POST['apellidos']) ) {
                        if ( $administrador->setEmail($_POST['email']) ) {
                            if ( $administrador->setUsuario($_POST['usuario']) ) {
                                if ( $administrador->setTelefono($_POST['telefono']) ) {
                                    if ( $administrador->setTipo(1) ) {
                                        if ( $administrador->createAdministrador() ) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Administrador registrado exitosamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Error al establecer el tipo de usuario';
                                    }
                                    
                                } else {
                                    $result['exception'] = 'Teléfono ingresado no válido';
                                }
                            } else {
                                $result['exception'] = 'Usuario no valido';
                            }
                        } else {
                            $result['exception'] = 'Dirección de correo no valida';
                        }
                    } else {
                        $result['exception'] = 'Los apellidos solo deben contener letras';
                    }
                } else {
                    $result['exception'] = 'Los nombre solo deben contener letras';
                }
            break;
            case 'login':
                $_POST = $administrador->validateForm( $_POST );
                if ( $administrador->checkEstado( $_POST['email'] )) {
                    if ( $administrador->checkEmail( $_POST['email'] ) ) {
                        if ( $administrador->checkClave( $_POST['clave'] ) ) {
                            $_SESSION['idadministrador'] = $administrador->getId();
                            $_SESSION['email'] = $administrador->getEmail();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                        
                    } else {
                        $result['exception'] = 'Correo electrónico incorrecto';
                    }
                } else {
                    $result['exception'] = 'Tu cuenta se encuentra inhabilitada';
                }               
            break;
            default:
                exit('Acción no disponible');
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