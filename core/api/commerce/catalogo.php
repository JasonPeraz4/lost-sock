<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/producto.php');
require_once('../../models/detalleProducto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se instancian las clases correspondientes.
    $producto = new Producto;
    $dP = new DetalleProducto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar según la petición del controlador.
    switch ($_GET['action']) {
        case 'readProductosCategoria':
            if ($producto->setIdCategoria($_POST['idcategoria'])) {
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
            if ($producto->setIdProducto($_POST['idproducto'])) {
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
        default:
            exit('Acción no disponible');
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
?>