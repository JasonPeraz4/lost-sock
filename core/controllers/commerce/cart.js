// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_COMPRA = '../../core/api/commerce/compra.php?action=';
const API_CATALOGO = '../../core/api/commerce/catalogo.php?action=readTallas';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los productos del carrito de compras para llenar la tabla en la vista.
    readCart();
});

// Función para obtener el detalle del pedido (carrito de compras).
function readCart()
{
    $.ajax({
        dataType: 'json',
        url: API_COMPRA + 'readCart'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje y se direcciona a la página principal.
        if ( response.status ) {
            // Se declara e inicializa una variable para concatenar las filas de la tabla en la vista.
            let content = '';
            // Se declara e inicializa una variable para calcular el importe por cada producto.
            let subtotal = 0;
            // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                subtotal = row.precio * row.cantidad;
                // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                content += `
                    <div class="row shadow p-3 mb-3">
                        <div class="col-md-4">
                            <img src="../../resources/img/producto/${row.imagen}" alt="Imagen del producto" class="w-75">
                        </div>
                        <div class="col-md-8">
                            <div class="row  mb-3">
                                <div class="col-12">
                                    <h4 class="float-left">${row.nombre}</h4>
                                    <div class="float-right">
                                        <i class="fad fa-pen mx-1 text-purple" onclick="openUpdateItemModal(${row.iddetallecompra}, ${row.idtalla}, ${row.cantidad}, ${row.idproducto})"></i>
                                        <i class="fad fa-trash mx-1 text-danger" onclick="openDeleteItemDialog(${row.iddetallecompra})"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-secondary"><small class="text-secondary">Talla</small> ${row.talla}</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-secondary"><small class="text-secondary">Cantidad</small> ${row.cantidad}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="text-secondary"><small class="text-secondary">Precio unitario</small> $${row.precio}</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-secondary"><small class="text-secondary">Subtotal</small> $${subtotal.toFixed(2)}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
            $( '#item-list' ).html( content );
        } else {
            sweetAlert( 4, response.exception, 'index.php' );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Función que abre una caja de dialogo (modal) con formulario para modificar la cantidad de producto.
function openUpdateItemModal( id, size, quantity, idproducto )
{
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#item-modal' ).modal( 'show' );
    // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
    $( '#iddetallecompra' ).val( id );
    $( '#cantidad' ).val( quantity );
    fillSelectTallas( API_CATALOGO , idproducto, 'talla', size);
}

// Evento para cambiar la cantidad de producto.
$( '#item-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_COMPRA + 'updateDetail',
        data: $( '#item-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se actualiza la tabla en la vista para mostrar la modificación de la cantidad de producto.
            readCart();
            // Se cierra la caja de dialogo (modal).
            $( '#item-modal' ).modal( 'hide' );
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});

// Función que abre una caja de dialogo para confirmar la finalización del pedido.
function finishOrder()
{
    swal({
        title: 'Aviso',
        text: '¿Está seguro de finalizar el pedido?',
        icon: 'info',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: API_PEDIDOS + 'finishOrder',
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    sweetAlert( 1, response.message, 'index.php' );
                } else {
                    sweetAlert( 2, response.exception, null );
                }
            })
            .fail(function( jqXHR ) {
                // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                if ( jqXHR.status == 200 ) {
                    console.log( jqXHR.responseText );
                } else {
                    console.log( jqXHR.status + ' ' + jqXHR.statusText );
                }
            });
        }
    });
}

// Función que abre una caja de dialogo para confirmar la eliminación de un producto del carrito de compras.
function openDeleteItemDialog( id )
{
    swal({
        title: 'Advertencia',
        text: '¿Está seguro que deseas remover el producto?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: API_COMPRA + 'deleteDetail',
                data: { iddetallecompra: id },
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un producto del pedido.
                    readCart();
                    sweetAlert( 1, response.message, null );
                } else {
                    sweetAlert( 2, response.exception, null );
                }
            })
            .fail(function( jqXHR ) {
                // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                if ( jqXHR.status == 200 ) {
                    console.log( jqXHR.responseText );
                } else {
                    console.log( jqXHR.status + ' ' + jqXHR.statusText );
                }
            });
        }
    });
}