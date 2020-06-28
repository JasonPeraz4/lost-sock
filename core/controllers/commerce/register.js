// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTE = '../../core/api/commerce/cliente.php?action=';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    
});

// Evento para realizar el registro de un cliente.
$( '#signin-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CLIENTE + 'register',
        data: $( '#signin-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se limpian los campos del formulario.
            $( '#signin-form' )[0].reset();
            sweetAlert( 1, response.message, 'login.php' );
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