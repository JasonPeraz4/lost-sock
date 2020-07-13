/*
*   Este controlador es de uso general en las páginas web del sitio público. Se importa en la plantilla del pie del documento.
*   Sirve para manejar todo lo que tiene que ver con la cuenta del cliente.
*/

// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../core/api/commerce/cliente.php?action=';
const API_COSTOENVIO = '../../core/api/dashboard/costoEnvio.php?action=readAll';
const API_DIRECCION = '../../core/api/commerce/direccion.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que llena los campos de los ajustes. Se ubica en el archivo sesion-actual.js
    loadProfile();
    showDirecciones();
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
                // Se inicializan los campos del formulario con los datos del usuario que ha iniciado sesión.
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
        data: $( '#profile-form' ).serialize(),
        dataType: 'json'
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
    fillSelect( API_COSTOENVIO, 'departamento', null );
}

function showDirecciones(  ){
    // Se obtiene la ruta del documento en el servidor web.
    let current = window.location.pathname;
    // Se obtiene el nombre del documento actual.
    let page = current.split("/").pop();
    if ( page == 'account.php' ) {
        $.ajax({
            dataType: 'json',
            url: API_DIRECCION + 'readOne'
        })
        .done(function( response ) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if ( response.status ) {
                let content = '';
                let n = 1;
                // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function( row ) {
                    let depto = `departamento${row.iddireccion}`
                    console.log(row.iddireccion)
                    // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                    content += `
                        <div class="form-group">
                            <label for="direccion${row.iddireccion}">Dirección ${n}</label>
                            <textarea class="form-control" rows="2" id="direccion${row.iddireccion}" name="direccion${row.iddireccion}" pattern="^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s]{1,120}$" title="Solo se permiten letras y números">${row.detalledireccion}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="departamento${row.iddireccion}">Departamento</label>
                                <select class="form-control" id="departamento${row.iddireccion}" name="departamento${row.iddireccion}">
                                </select>
                            </div>
                        </div>
                    `;
                    n++;
                    fillSelect( API_COSTOENVIO, depto, row.iddepartamento );
                });
                // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
                $( '#direcciones-body' ).html( content );
        
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
}