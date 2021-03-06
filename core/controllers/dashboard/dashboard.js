// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/dashboard/producto.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    graficaVentas();
    graficaGanancias();
    graficaCategorias();
    graficaTipo();
    cantidadPedidos();
    cantidadSuscripciones();
    readTopProductos();
    graficaSuscripciones();
});

// Función para graficar las ventas mensuales
function graficaVentas()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'cantidadVentas',
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

// Función para graficar las ganancias mensuales.
function graficaGanancias()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'gananciasMes',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let mes = [];
            let ganancia = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                mes.push( row.mes );
                ganancia.push( row.ganancia );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'chGanancias', mes, ganancia, 'Ganancias del mes (en dólares)', 'Ganancias por mes' );
        } else {
            $( '#chGanacias' ).remove();
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

function graficaSuscripciones()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'ingresoSuscripciones',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let plan = [];
            let ganancia = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                plan.push (String( row.plan ));
                console.log (plan);
                ganancia.push( row.ganancia );
                console.log(ganancia);
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'chSuscripciones', plan, ganancia, 'Ganancias (dólares)', 'Ingresos por suscripciones' );
        } else {
            $( '#chSuscripciones' ).remove();
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
function graficaCategorias()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'cantidadCategoria',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let categoria = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                categoria.push( row.categoria );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            pieGraph( 'chCategoria', categoria, cantidad, 'Cantidad', 'Cantidad de productos según su categoría' );
        } else {
            $( '#chCategoria' ).remove();
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
function graficaTipo()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'cantidadTipo',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let tipo = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                tipo.push( row.tipo );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            pieGraph( 'chTipo', tipo, cantidad, 'Cantidad', 'Cantidad de productos según su tipo' );
        } else {
            $( '#chTipo' ).remove();
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
        url: API_PRODUCTO + 'cantidadPedidos',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            $( '#pedidos' ).text( `${response.dataset.cantidad} pedidos` );
            $( '#gananciasP' ).text( `$${response.dataset.ganancias}` );
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
        url: API_PRODUCTO + 'cantidadSuscripciones',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            $( '#suscripciones' ).text( `${response.dataset.cantidad} suscripciones` );
            $( '#gananciasS' ).text( `$${response.dataset.ganancias}` );
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


function readTopProductos( )
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'readTopProductos',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            let content = '';
            // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                content += `
                    <tr>
                        <td>${row.nombre}</td>
                        <td>${row.cantidad}</td>
                        <td>${row.ganancia}</td>
                    </tr>
                `;
            });
            // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
            $( '#tbody-rows' ).html( content );
        } else {
            sweetAlert( 4, response.exception, null );
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
