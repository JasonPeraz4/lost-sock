// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_ADMINISTRADOR = '../../core/api/dashboard/administrador.php?action=';
const API_TIPOUSUARIO = '../../core/api/dashboard/tipoUsuario.php?action=readAll';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de administradores. Se ubica en el archivo account.js
    readRows( API_ADMINISTRADOR );
});

function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se establece un icono para el estado del producto.
        ( row.estado ) ? txt = 'Activo' : txt = 'Inactivo';
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td><i class="fas fa-user-circle fa-3x mr-3 text-purple"></i></td>
                <td>
                    <div>${row.nombres} ${row.apellidos}</div>
                    <div>${row.email}</div>
                </td>
                <td>${row.usuario}</td>
                <td>${row.telefono}</td>
                <td>${row.tipo}</td>
                <td>${txt}</td>
                <td>
                    <i class="fas fa-edit mx-1" data-toggle="modal" data-target="#admin-modal"></i>
                    <i class="fas fa-trash-alt" data-toggle="modal" data-target="#eliminarUsuario"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    $( '#admin-table' ).DataTable({
        'language': {
            'url': './../core/helpers/Spanish.json' ,
            'search': 'Buscar administrador:'
        }
    });
}

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#admin-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#admin-modal' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Agregar administrador' );
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#foto_administrador' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
    fillSelect( API_TIPOUSUARIO, 'tipo_administrador', null );
}
