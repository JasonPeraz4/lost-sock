// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_TIPOUSUARIO = '../../core/api/dashboard/tipoUsuario.php?action=';

// Método que se ejecuta una vez la página este lista.
$( document ).ready( function(){
    //Se llama a la función que verifica la existencia de tipos de usuario. Se ubica en el archivo account.js
    readRows( API_TIPOUSUARIO );
});

function fillTable( dataset )
{
    if ($.fn.dataTable.isDataTable('#myTable')) {
        $('#myTable').DataTable().clear();
        $('#myTable').DataTable().destroy();
    }
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td class="pl-4">${row.tipo}</td>
                <td>
                    <i class="fas fa-edit mx-1" onclick="openUpdateModal(${row.idtipousuario})"></i>
                    <i class="fas fa-trash-alt" onclick="openDeleteDialog(${row.idtipousuario}-                                                                                                                                  )"></i>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    $( '#myTable' ).DataTable({
        'language': {
            'url': '../../core/helpers/Spanish.json' ,
            'search': 'Buscar administrador:' ,
            
        }
    });
}