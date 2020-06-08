// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/dashboard/producto.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    /*$('#pagination-demo').twbsPagination({
        totalPages: 35,
        visiblePages: 7,
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });*/

    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams( location.search );
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get( 'id' );
    // Se llama a la función que muestra el detalle del producto seleccionado previamente.
    readComentarios( ID );
});

// Función para obtener y mostrar los datos del producto seleccionado.
function readComentarios( id )
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'readComentarios',
        data: { idproducto: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            let content = '';
            // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                ( row.estado == 1 ) ? txt = row.comentario : txt = 'Este comentario ha sido eliminado.';
                ( row.estado == 1 ) ? dnone = '' : dnone = ' d-none';
                // Se crean y concatenan las filas de la tabla con los datos de cada registro.
                content += `
                    <div class="media border p-3 mb-3">
                        <img src="../../resources/img/clientes/default.png" alt="John Doe" class="mr-3 rounded-circle img-avatar">
                        <div class="media-body">
                            <h4>${row.nombres} ${row.apellidos} <small><i>Publicado el ${row.fecha}</i></small> <i class="fas fa-ban ml-5 text-danger${dnone}" onclick="openDeleteDialog(${row.idcomentario})" data-toggle="tooltip" title="Eliminar"></i></h4>
                            <p>${txt}</p>
                        </div>
                    </div>
                `;
            });
            // Se agregan los comentarios al contenido de la página
            $( '#page-content' ).html( content );
    
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

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    swal({
        title: 'Advertencia',
        text: '¿Estas seguro que deseas deshabilitar este comentario?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Aceptar para hacer la petición de borrado, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: API_PRODUCTO + 'deleteComentario',
                data: { idcomentario: id },
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se busca en la URL las variables (parámetros) disponibles.
                    let params = new URLSearchParams( location.search );
                    // Se obtienen los datos localizados por medio de las variables.
                    const ID = params.get( 'id' );
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                    readComentarios( ID );
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