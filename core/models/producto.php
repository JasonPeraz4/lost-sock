<?php
/*
*	Clase para manejar la tabla producto de la base de datos. Es clase hija de Validator.
*/
class Producto extends Validator
{
    // Declaración de atributos (propiedades).
    private $idProducto = null;
    private $nombre = null;
    private $descripcion = null;
    private $descuento = null;
    private $precio = null;
    private $idCategoria = null;
    private $idTipoProducto = null;
    private $idColor = null;
    private $imagen = null;
    private $archivo = null;
    private $ruta = '../../../resources/img/producto/';
    private $idComentario = null;
    private $estado = null;

    /*
    * ID's de las categorias
    *   1. Mujeres
    *   2. Hombres
    *   3. Niños
    *   4. Exclusivos
    *   5. edición limitada
    */

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idProducto = $value;
            return true;
        } else {
            return false;
        }
    }
 
    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 75)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescuento($value)
    {
        if (($value%1) == 0 && $value >= 0 && $value < 100 ) {
            $this->descuento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCategoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTipoProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTipoProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdComentario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idComentario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoComentario($value)
    {
        $this->estado = $value;
            return true;
    }

    public function setIdColor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idColor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getTipoProducto()
    {
        return $this->idTipoProducto;
    }

    public function getIdColor()
    {
        return $this->idColor;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }
    /*
    *   Métodos para realizar las operaciones CRUD (search, create, read, update, delete).
    */
    
    public function createProducto()
    {   
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO producto(nombre, descripcion, precio, descuento, imagen, idColor, idCategoria, idTipoProducto)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
            $params = array( $this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->imagen, $this->idColor, $this->idCategoria, $this->idTipoProducto );
            return Database::executeRow( $sql, $params );
        } else {
            return false;
        }
    }

    public function readAllProductos()
    {
        $sql = 'SELECT idProducto, nombre, descripcion, precio, descuento, imagen, color, categoria, tipo
                FROM producto INNER JOIN color USING(idColor) INNER JOIN categoria USING(idCategoria) INNER JOIN tipoProducto USING(idTipoProducto)
                ORDER BY idProducto';
        $params = null;
        return Database::getRows( $sql, $params );
    }

    public function readProducto()
    {
        $sql = 'SELECT idProducto, nombre, descripcion, precio, descuento, imagen, idColor, idCategoria, idTipoProducto
                FROM producto
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::getRow( $sql, $params );
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT producto.idproducto, nombre, imagen, producto.precio, codigo, valoracion(producto.idproducto) 
                FROM producto INNER JOIN color USING(idColor)
                WHERE producto.idcategoria = ?';
        $params = array( $this->idCategoria);
        return Database::getRows( $sql, $params);
    }

    public function readProductosTipo()
    {
        $sql = 'SELECT nombre, imagen, producto.precio, SUM(detalleCompra.precio*detalleCompra.cantidad) as ganancia
                FROM producto JOIN detalleCompra USING(idproducto)
                WHERE producto.idtipoproducto = ? GROUP BY nombre, imagen, producto.precio
                ORDER BY SUM(detalleCompra.precio*detalleCompra.cantidad) DESC';
        $params = array( $this->idTipoProducto);
        return Database::getRows( $sql, $params);
    }

    public function readProductoCategoria()
    {
        $sql = 'SELECT producto.idproducto, nombre, descripcion, imagen, producto.precio, codigo, valoracion(producto.idproducto), tipo 
                FROM producto INNER JOIN color USING(idColor) INNER JOIN tipoProducto USING(idtipoproducto)
                WHERE producto.idproducto = ?';
        $params = array( $this->idProducto);
        return Database::getRow( $sql, $params);
    }

    public function updateProducto(){
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE producto 
                    SET imagen = ?, nombre = ?, descripcion = ?, precio = ?, descuento = ?, idColor = ?, idCategoria = ?, idTipoProducto = ? 
                    WHERE idProducto = ?';
            $params=array( $this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->idColor, $this->idCategoria, $this->idTipoProducto, $this->idProducto );
        } else {
            $sql = 'UPDATE producto 
                    SET nombre = ?, descripcion = ?, precio = ?, descuento = ?, idColor = ?, idCategoria = ?, idTipoProducto = ? 
                    WHERE idProducto = ?';
            $params=array( $this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->idColor, $this->idCategoria, $this->idTipoProducto, $this->idProducto );
        }
        return Database::executeRow( $sql, $params );
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM producto
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::executeRow( $sql, $params );
    }

    public function readComentarios()
    {
        $sql = 'SELECT idcomentario, nombres, apellidos, comentario, fecha, calificacion, comentario.estado 
                FROM comentario INNER JOIN detalleCompra dC USING(iddetallecompra) INNER JOIN compra USING(idcompra) INNER JOIN cliente USING(idcliente) 
                WHERE dC.idproducto = ? ORDER BY fecha DESC';
        $params = array( $this->idProducto );
        return Database::getRows( $sql, $params );
    }

    public function disableComentario()
    {
        $sql = 'UPDATE comentario SET estado = ? WHERE idcomentario = ?';
        $params = array( $this->estado, $this->idComentario );
        return Database::executeRow( $sql, $params );
    }

    //Consulta gráfico
    public function cantidadVentas()
    {
        $sql = "SELECT to_month(date_part('month', fechaCompra)) AS mes, COUNT(date_part('month', fechaCompra)) AS cantidad 
                FROM compra GROUP BY date_part('month', fechaCompra) ORDER BY date_part('month', fechaCompra)";
        $params = null;
        return Database::getRows($sql, $params);
    }
    //Consulta gráfico
    public function cantidadCategoria()
    {
        $sql = 'SELECT categoria, COUNT(producto.idCategoria)  AS cantidad 
                FROM detalleCompra 
                JOIN producto USING(idProducto) JOIN categoria USING(idCategoria) GROUP BY categoria
                ';
        $params = null;
        return Database::getRows($sql, $params);
    }
    //Consulta gráfico
    public function cantidadTipo()
    {
        $sql = 'SELECT tipo, COUNT(producto.idTipoProducto)  AS cantidad 
                FROM detalleCompra 
                JOIN producto USING(idProducto) JOIN tipoProducto USING(idTipoProducto) GROUP BY tipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Consulta gráfico (Ganancias por mes)
    public function gananciasMes()
    {
        $sql = "SELECT to_month(date_part('month', fechaCompra)) AS mes, SUM(total) AS ganancia 
                FROM compra GROUP BY date_part('month', fechaCompra) ORDER BY date_part('month', fechaCompra)";
        $params = null;
        return Database::getRows( $sql, $params);
    }

    //Consulta de gráfico (Ingresos por suscripciones)
    public function ingresoSuscripciones()
    {
        $sql = "SELECT concat_ws(' ', 'Plan de ', cantidadPares, ' pares') AS plan, SUM(precio) AS ganancia FROM suscripcion
                JOIN planSuscripcion USING(idPlanSuscripcion) GROUP BY concat_ws(' ', 'Plan de ', cantidadPares, ' pares')";
        $params = null;
        return Database::getRows( $sql, $params);
    }

    public function cantidadPedidos()
    {
        $sql = "SELECT COUNT(idcompra) AS cantidad, SUM(total) AS ganancias
                FROM compra WHERE fechacompra BETWEEN (SELECT date_trunc('MONTH',now())::DATE) 
                AND (SELECT (date_trunc('month', now()::DATE) + INTERVAL '1 month' - INTERVAL '1 day')::DATE)";
        $params = null;
        return Database::getRow( $sql, $params );
    }
    
    public function cantidadSuscripciones()
    {
        $sql = "SELECT COUNT(idsuscripcion) AS cantidad, SUM(precio) AS ganancias FROM suscripcion 
                INNER JOIN planSuscripcion USING(idplansuscripcion) WHERE fecha
                BETWEEN (SELECT date_trunc('MONTH',now())::DATE) 
                AND (SELECT (date_trunc('month', now()::DATE) + INTERVAL '1 month' - INTERVAL '1 day')::DATE)";
        $params = null;
        return Database::getRow( $sql, $params );
    }

    public function readTopProductos()
    {
        $sql = "SELECT SUM(cantidad) AS cantidad, nombre, SUM(producto.precio*cantidad) AS ganancia 
                FROM detalleCompra INNER JOIN producto USING(idproducto) 
                GROUP BY nombre ORDER BY SUM(cantidad) DESC LIMIT 5";
        $params = null;
        return Database::getRows( $sql, $params );
    }
}
?>