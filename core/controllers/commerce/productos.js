// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CATALOGO = '../../core/api/commerce/catalogo.php?action=';

// Método que se ejecuta una vez la página este lista.
$(document).ready(function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams( location.search );
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get( 'id' );
    // Se llama a la función que muestra los productos de la categoría seleccionada previamente.
    readProductosCategoria( ID );
});

// Función para obtener y mostrar los productos.
function readProductosCategoria( id )
{
    $.ajax({
        dataType: 'json',
        url: API_CATALOGO + 'readProductosCategoria',
        data: { idcategoria: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
        if ( response.status ) {
            let content = '';
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                let valoracion = '';
                let selectId = `tallas${row.idproducto}`;
                for (let i = 0; i < 5; i++) {
                    let stars = row.valoracion;
                    if ( stars > i ) {
                        valoracion += `
                            <span class="fa fa-star text-yellow" id="product--star"></span>
                        `;
                    } else {
                        valoracion += `
                            <span class="fa fa-star text-secondary" id="product--star"></span>
                        `;
                    }
                }
                // Se crean y concatenan las tarjetas con los datos de cada producto.
                content += `
                    <!-- Card del producto -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                        <div class="card product--detail custom--card">
                            <img class="card-img-top" src="../../resources/img/producto/${row.imagen}" alt="Card image cap">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <!-- Título de la card -->
                                        <a href="product-detail.php?id=${row.idproducto}">
                                            <h5 class="card-title">${row.nombre}</h5>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <p class="float-right text-purple font-weight-bold">$${row.precio}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <span class="dot product--color" style="background-color:${row.codigo};"></span>
                                        <!-- Colores -->
                                    </div>
                                    <div class="col-8">
                                        <!-- Valoración -->
                                        <div class="star--card float-right">
                                            ${valoracion}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <!-- Tallas -->
                                        <select class="form-control form-control-sm" id="${selectId}" name="talla">
                                        </select>
                                    </div>
                                    <div class="col-6 text-center">
                                        <input type="number" class="form-control form-control-sm float-right" placeholder="Cantidad" id="cantidad" name="cantidad" min="1" title="Solo se permiten números naturales">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mb-3">
                                    <button type="button" class="btn btn-primary btn-add custom--button" onClick="addProduct(${row.idproducto})">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End card del producto -->
                `;
                fillSelectTallas( API_CATALOGO + 'readTallas', row.idproducto, selectId);
            });
            // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
            $( '#productos' ).html( content );
        } else {
            // Se presenta un mensaje de error cuando no existen datos para mostrar.
            // $( '#title' ).html( `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>` );
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

function addProduct(id) {
    let selectId = `tallas${id}`;
}