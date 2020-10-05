// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTE = '../../core/api/commerce/cliente.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    
});

// Evento que valida al administrador al presionar el botón de iniciar sesión.
$( '#sendmail-form' ).submit( function( event ){
    // Se evita recargar la página web de enviar formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CLIENTE + 'sendMail',
        data: $( '#sendmail-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, 'recover-code.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail( function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    })
});

$( '#token-form' ).submit( function( event ){
    // Se evita recargar la página web de enviar formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CLIENTE + 'verifyToken',
        data: $( '#token-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            sweetAlert( 1, response.message, 'recover-pass.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail( function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    })
});

// Evento para cambiar la contraseña del usuario que ha iniciado sesión.
$( '#recoverpass-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CLIENTE + 'changePassword',
        data: $( '#recoverpass-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            $( '#recoverpass-form' )[0].reset();
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