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
                if ($cliente->setEstado(0)) {
                    if ($cliente->setIdCliente($_SESSION['idcliente'])) {
                        if ($cliente->updateEstado()) {
                            unset($_SESSION['idcliente']);
                            if ( !isset( $_SESSION['idcliente']) ) {
                                $result['status'] = 1;
                                $result['message'] = 'Sesión cerrada con exito';
                            } else {
                                $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                            }
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
                        if ( $_POST[ 'clave1' ] != $_POST[ 'claveactual' ] ) {
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
                            $result['exception'] = 'Asegurate de ingresar una contraseña diferente a la actual';
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
                // Se sanea el valor del token para evitar datos maliciosos.
                $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                if ($token) {
                    $secretKey = '6LfnctEZAAAAAFAie5FVHAjBivq9KzXLwsJ5-LZ6';
                    $ip = $_SERVER['REMOTE_ADDR'];

                    $data = array(
                        'secret' => $secretKey,
                        'response' => $token,
                        'remoteip' => $ip
                    );

                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data)
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    );

                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $context  = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $captcha = json_decode($response, true);

                    if ($captcha['success']) {
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
                    } else {
                        $result['exception'] = 'No eres un humano';
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
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
                                $cliente->setEstado(1);
                                $cliente->updateEstado();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
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