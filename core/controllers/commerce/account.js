/*
*   Este controlador es de uso general en las páginas web del sitio público. Se importa en la plantilla del pie del documento.
*   Sirve para manejar todo lo que tiene que ver con la cuenta del cliente.
*/

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../core/api/commerce/cliente.php?action=';
const API_DEPARTAMENTO = '../../core/api/commerce/direccion.php?action=readAllDepartamentos';
const API_DIRECCION = '../../core/api/commerce/direccion.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que llena los campos de los ajustes. Se ubica en el archivo sesion-actual.js
    loadProfile();
    fillTable();
});

// Función que abre una caja de dialogo para confirmar el cierre de la sesión del usuario. Requiere el archivo sweetalert.min.js para funcionar.
function logOut()
{
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de cerrar la sesión?',
        icon: 'warning',
        buttons: [ 'No', 'Sí' ],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
        if ( value ) {
            $.ajax({
                dataType: 'json',
                url: API + 'logout'
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
        } else {
            sweetAlert( 4, 'Puede continuar con la sesión', null );
        }
    });
}

function loadProfile(){
    // Se obtiene la ruta del documento en el servidor web.
    let current = window.location.pathname;
    // Se obtiene el nombre del documento actual.
    let page = current.split("/").pop();
    if ( page == 'account.php' ) {
        $( '#profile-form' )[0].reset();
        $( '#password-form' )[0].reset();
        $.ajax({
            dataType: 'json',
            url: API + 'readProfile'
        })
        .done(function( response ){
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if ( response.status ) {
                let src = '../../resources/img/clientes/';
                src+=response.dataset.imagen;
                // Se inicializan los campos del formulario con los datos del usuario que ha iniciado sesión.
                $("#profile-picture").attr('src', src);
                $( '#nombres' ).val( response.dataset.nombres );
                $( '#apellidos' ).val( response.dataset.apellidos );
                $( '#telefono' ).val( response.dataset.telefono );
                $( '#email' ).val( response.dataset.email );
                $( '#usuario' ).val( response.dataset.usuario );
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
}

// Evento para editar el perfil del usuario que ha iniciado sesión.
$( '#profile-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'editProfile',
        data: new FormData( $( '#profile-form' )[0] ),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, 'account.php' );
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

// Evento para cambiar la contraseña del cliente que ha iniciado sesión.
$( '#password-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'changePassword',
        data: $( '#password-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            $( '#password-form' )[0].reset();
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

//Función para mostrar las direcciones
function fillTable(  ){
    // Se obtiene la ruta del documento en el servidor web.
    let current = window.location.pathname;
    // Se obtiene el nombre del documento actual.
    let page = current.split("/").pop();
    if ( page == 'account.php' ) {
        $.ajax({
            dataType: 'json',
            url: API_DIRECCION + 'readAll'
        })
        .done(function( response ) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if ( response.status ) {
                let content = '';
                let n = 1;
                // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function( row ) {
                    let depto = `departamento${row.iddireccion}`;
                    // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                    content += `
                        <div class="form-group">
                            <label for="direccion${row.iddireccion}">Dirección ${n}</label><i class="fad fa-pen mx-1 text-purple" onclick="openUpdateModal(${row.iddireccion})"></i><i class="fad fa-trash mx-1 text-danger" onclick="openDeleteAdressDialog(${row.iddireccion})"></i>
                            <textarea class="form-control" rows="2" id="direccion${row.iddireccion}" disabled>${row.detalledireccion}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="${depto}">Departamento</label>
                                <select class="form-control" id="${depto}" disabled>
                                </select>
                            </div>
                        </div>
                    `;
                    if ( n==5 ){
                        $( '#lblAgregar' ).addClass( 'd-none' );
                    }
                    n++;
                    fillSelect( API_DEPARTAMENTO, depto, row.iddepartamento );
                });
                // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
                $( '#direcciones-body' ).html( content );
        
            } else {
                //sweetAlert( 4, 'No hay direiones registradas', null );
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
}

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Agregar dirección' );
    // Se llama a la función que llenar los select del formulario. Se encuentra en el archivo components.js
    fillSelect( API_DEPARTAMENTO, 'departamento_direccion', null );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Actualizar dirección' );

    $.ajax({
        dataType: 'json',
        url: API_DIRECCION + 'readOne',
        data: { iddireccion: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#iddireccion' ).val( response.dataset.iddireccion );
            $( '#direccion' ).val( response.dataset.detalledireccion );
            fillSelect( API_DEPARTAMENTO, 'departamento_direccion', response.dataset.iddepartamento );
        } else {
            sweetAlert( 2, result.exception, null );
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

// Evento para crear o modificar un registro.
$( '#save-form' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crear o actualizar un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#iddireccion' ).val() ) {
        saveRow( API_DIRECCION, 'update', this, 'save-modal' );
    } else {
        saveRow( API_DIRECCION, 'create', this, 'save-modal' );
    }
});

// Función que abre una caja de dialogo para confirmar la eliminación de un producto del carrito de compras.
function openDeleteAdressDialog( id )
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
                url: API_DIRECCION + 'delete',
                data: { iddireccion: id },
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un producto del pedido.
                    fillTable();
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