<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/cliente.php');
require_once('../../models/direccion.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Cliente;
    $direccion = new Direccion;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['idcliente'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logout':
                if (1 === 1) {
                    unset($_SESSION['idcliente']);
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'readProfile':
                if ( $cliente->setIdCliente( $_SESSION['idcliente'] ) ) {
                    if ( $result[ 'dataset' ] = $cliente->readOneCliente() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Cliente no existente';
                    }
                } else {
                    $result['exception'] = 'Identificador no válido';
                }
                break;
            case 'editProfile':
                if ( $cliente->setIdCliente( $_SESSION[ 'idcliente' ] ) ) {
                    if ( $data = $cliente->readOneCliente() ) {
                        $_POST = $cliente->validateForm( $_POST );
                        if ( $cliente->setNombres($_POST['nombres']) ) {
                            if ( $cliente->setApellidos($_POST['apellidos']) ) {
                                if ( $cliente->setTelefono( $_POST[ 'telefono' ] ) ) {
                                    if ( !$cliente->checkProfile( 'telefono', $_POST[ 'telefono' ] ) ) {
                                        if ( $cliente->setEmail($_POST['email']) ) {
                                            if ( !$cliente->checkProfile( 'email', $_POST[ 'email' ] ) ) {
                                                if ( $cliente->setUsuario($_POST['usuario']) ) {
                                                    if ( !$cliente->checkProfile( 'usuario', $_POST[ 'usuario' ] ) ) {
                                                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                                            if ($cliente->setImagen($_FILES['imagen'])) {
                                                                if ( $cliente->editProfile() ) {
                                                                    $_SESSION['email'] = $cliente->getEmail();
                                                                    $_SESSION['usuario'] = $cliente->getUsuario();
                                                                    $_SESSION['nombres'] = $cliente->getNombres();
                                                                    $_SESSION['apellidos'] = $cliente->getApellidos();
                                                                    $_SESSION['telefono'] = $cliente->getTelefono();
                                                                    $result['status'] = 1;
                                                                    if ( $data['imagen'] == 'default.png' ) {
                                                                        $result['message'] = 'Perfil actualizado actualizado correctamente';
                                                                    } else {
                                                                        if ($cliente->deleteFile($cliente->getRuta(), $data['imagen'])) {
                                                                            $result['message'] = 'Perfil modificado correctamente';
                                                                        } else {
                                                                            $result['message'] = 'Perfil actualizado pero la imagen no';
                                                                        }
                                                                    }
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                                $result['exception'] = $cliente->getImageError();
                                                            }
                                                        } else {
                                                            if ( $cliente->editProfile() ) {
                                                                $_SESSION['email'] = $cliente->getEmail();
                                                                $_SESSION['usuario'] = $cliente->getUsuario();
                                                                $_SESSION['nombres'] = $cliente->getNombres();
                                                                $_SESSION['apellidos'] = $cliente->getApellidos();
                                                                $_SESSION['telefono'] = $cliente->getTelefono();
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Perfil actualizado con éxito';
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Este usuario ya se encuentra registrado';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Usuario no válido';
                                                }
                                            } else {
                                                $result['exception'] = 'Este correo electrónico ya se encuentra registrado';
                                            }
                                        } else {
                                            $result['exception'] = 'Dirección de correo no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Este teléfono ya se encuentra registrado';
                                    }
                                } else {
                                    $result['exception'] = 'Teléfono no válido';
                                }
                            } else {
                                $result['exception'] = 'Los apellidos solo deben contener letras';
                            }
                        } else {
                            $result['exception'] = 'Los nombres solo deben contener letras';
                        }
                    } else {
                        $result['exception'] = 'Administrador inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
                break;
            case 'changePassword':
                if ( $cliente->setIdCliente( $_SESSION[ 'idcliente' ] ) ) {
                    $_POST = $cliente->validateForm( $_POST );
                    if ( $cliente->checkClave( $_POST[ 'claveactual' ] ) ) {
                        if ( $_POST[ 'clave1' ] == $_POST[ 'clave2' ] ) {
                            if ( $cliente->setClave( $_POST[ 'clave1' ] ) ) {
                                if ( $cliente->changePassword() ) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Contraseña actualizada con correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'La contraseña no cumple con los requerimientos mínimos';
                            }
                        } else {
                            $result['exception'] = 'Las contraseñas no coinciden';
                        }
                    } else {
                        $result['exception'] = 'Contraseña actual incorrecta';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
                break;
            default:
                exit('Acción no disponible dentro de la sesión');
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                if ( $cliente->setNombres($_POST['nombres']) ) {
                    if ( $cliente->setApellidos($_POST['apellidos']) ) {
                        if ( $cliente->setTelefono( $_POST[ 'telefono' ] ) ) {
                            if ( !$cliente->checkExist( 'telefono', $_POST[ 'telefono' ] ) ) {
                                if ( $cliente->setEmail($_POST['email']) ) {
                                    if ( !$cliente->checkExist( 'email', $_POST[ 'email' ] ) ) {
                                        if ( $cliente->setUsuario($_POST['usuario']) ) {
                                            if ( !$cliente->checkExist( 'usuario', $_POST[ 'usuario' ] ) ) {
                                                if ( $_POST[ 'clave1' ] == $_POST[ 'clave2' ] ) {
                                                    if ( $cliente->setClave( $_POST[ 'clave1' ] ) ) {
                                                        if ( $cliente->createCliente() ) {
                                                            if ( $direccion->setIdCliente( $cliente->getIdCliente() ) ) {
                                                                if ( $direccion->setDireccion( $_POST[ 'direccion' ] ) ) {
                                                                    if ( $direccion->setIdDepartamento( $_POST[ 'departamento_direccion' ] ) ) {
                                                                        if ( $direccion->createDireccion() ) {                
                                                                            $result['status'] = 1;
                                                                            $result['message'] = '¡Registrado correctamente! Inicia sesión con tu nueva cuenta';
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
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'La contraseña no cumple con los requerimientos mínimos';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Las contraseñas no coinciden';
                                                }
                                            } else {
                                                $result['exception'] = 'Este usuario ya se encuentra registrado';
                                            }
                                        } else {
                                            $result['exception'] = 'Usuario no válido';
                                        }
                                    } else {
                                        $result['exception'] = 'Este correo electrónico ya se encuentra registrado';
                                    }
                                } else {
                                    $result['exception'] = 'Dirección de correo no válida';
                                }
                            } else {
                                $result['exception'] = 'Este teléfono ya se encuentra registrado';
                            }
                        } else {
                            $result['exception'] = 'Teléfono no válido';
                        }
                    } else {
                        $result['exception'] = 'Los apellidos solo deben contener letras';
                    }
                } else {
                    $result['exception'] = 'Los nombres solo deben contener letras';
                }
                break;
            case 'login':
                $_POST = $cliente->validateForm( $_POST );
                if ( $cliente->setEmail($_POST['email']) ) {
                    if ( $cliente->checkEmail( $_POST['email'] )) {
                        if ( $cliente->checkEstado( $_POST['email'] ) ) {
                            if ( $cliente->checkClave( $_POST['clave'] ) ) {
                                $_SESSION['idcliente'] = $cliente->getIdCliente();
                                $_SESSION['email'] = $cliente->getEmail();
                                $_SESSION['usuario'] = $cliente->getUsuario();
                                $_SESSION['nombres'] = $cliente->getNombres();
                                $_SESSION['apellidos'] = $cliente->getApellidos();
                                $_SESSION['telefono'] = $cliente->getTelefono();
                                $_SESSION['imagen'] = $cliente->getImagen();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                $result['exception'] = 'Contraseña incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Tu cuenta se encuentra inhabilitada';
                        }
                    } else {
                        $result['exception'] = 'Correo electrónico incorrecto';
                    }
                } else {
                    $result['exception'] = 'Asegurate de ingresar tus datos para iniciar sesión';
                }               
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