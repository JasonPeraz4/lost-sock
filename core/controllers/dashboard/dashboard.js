// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/dashboard/producto.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    
});

// Función para graficar la cantidad de productos por categoría.
function graficaVentas()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadVentas',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let meses = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                meses.push( row.mes );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph( 'chVentas', meses, cantidad, 'Cantidad de ventas', 'Cantidad de ventas realizadas por mes' );
        } else {
            $( '#chVentas' ).remove();
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

// Función para graficar la cantidad de productos por categoría.
function cantidadPedidos()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadPedidos',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            $( '#pedidos' ).text( `${row.cantidad} pedidos` );
            $( '#gananciasP' ).text( `$${row.ganancias}` );
            $( '#gananciasP' ).addClass( 'text-success' );
        } else {
            $( '#pedidos' ).text( '0 pedidos' );
            $( '#gananciasP' ).text( '$0.00' );
            $( '#gananciasP' ).addClass( 'text-danger' );
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

// Función para graficar la cantidad de productos por categoría.
function cantidadSuscripciones()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadSuscripciones',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            $( '#suscripciones' ).text( `${row.cantidad} suscripciones` );
            $( '#gananciasS' ).text( `$${row.ganancias}` );
            $( '#gananciasS' ).addClass( 'text-success' );
        } else {
            $( '#suscripciones' ).text( '0 suscripciones' );
            $( '#gananciasS' ).text( '$0.00' );
            $( '#gananciasS' ).addClass( 'text-danger' );
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
