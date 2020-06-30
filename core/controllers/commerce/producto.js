// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTO = '../../core/api/commerce/producto.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get('id');
    const NAME = params.get('nombre');
    // Se llama a la función que muestra los productos de la categoría seleccionada previamente.
    readProductosCategoria(ID, NAME);
});

// Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada.
function readProductosCategoria(id, categoria) {
    $.ajax({
        dataType: 'json',
        url: API_CATALOGO + 'readProductosCategoria',
        data: { idCategoria: id },
        type: 'post'
    })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
            if (response.status) {
                let content = '';
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se crean y concatenan las tarjetas con los datos de cada producto.
                    content += `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="------" alt="Card image">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title" id="titulo-producto"></h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold" id="precio-producto"></p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-5 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--inactive" style="background-color: red!important;" id="color-producto"></span>
                                        <span class="dot product--color bg--inactive" data-toggle="tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-7 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="estrella-producto"></span>
                                            <span class="fa fa-star text-yellow" id="estrella-producto"></span>
                                            <span class="fa fa-star text-yellow" id="estrella-producto"></span>
                                            <span class="fa fa-star text-yellow" id="estrella-producto"></span>
                                            <span class="fa fa-star text-yellow" id="estrella-producto"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="talla-producto">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number" id="cantidad-producto">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php" id="agregar-producto">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                `;
                });
                // Se asigna como título la categoría de los productos.
                $('#title').text(`Categoría: ${categoria}`);
                // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                $('#productos').html(content);
            } else {
                // Se presenta un mensaje de error cuando no existen datos para mostrar.
                $('#title').html(`<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>`);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}