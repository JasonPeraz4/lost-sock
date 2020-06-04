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
    private $archivo = null;
    private $ruta = '../../../resources/img/producto/';

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
        if ($this->validateNaturalNumber($value)) {
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

    /*
    *   Métodos para realizar las operaciones CRUD (search, create, read, update, delete).
    */
    
    public function createProducto()
    {
        $sql = 'INSERT INTO producto(nombre, descripcion, precio, descuento, idCategoria, idTipoProducto)
                VALUES(?, ?, ?, ?, ?, ?)';
        $params = array( $this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->idCategoria, $this->idTipoProducto );
        return Database::executeRow( $sql, $params );
       
    }

    public function readAllProductos()
    {
        $sql = 'SELECT idProducto, nombre, descripcion, precio, descuento, categoria, tipo
                FROM producto INNER JOIN categoria USING(idCategoria) INNER JOIN tipoProducto USING(idTipoProducto)
                ORDER BY idProducto';
        $params = null;
        return Database::getRows( $sql, $params );
    }

    public function readProducto()
    {
        $sql = 'SELECT idProducto, nombre, descripcion, precio, descuento, idCategoria, idTipoProducto
                FROM producto
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::getRow( $sql, $params );
    }

    public function updateProducto(){
        $sql = 'UPDATE producto 
                SET nombre = ?, descripcion = ?, precio = ?, descuento = ?, idCategoria = ?, idTipoProducto = ? 
                WHERE idProducto = ?';
        $params=array( $this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->idCategoria, $this->idTipoProducto, $this->idProducto );
        return Database::executeRow( $sql, $params );
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM producto
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::executeRow( $sql, $params );
    }

}
?>