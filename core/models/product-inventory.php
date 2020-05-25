<?php
/*
*	Clase para manejar la tabla producto de la base de datos. Es clase hija de Validator.
*/
class Product_Inventory extends Validator
{
    // Declaración de atributos (propiedades).
    private $idProducto = null;
    private $nombre = null;
    private $descripcion = null;
    private $descuento = null;
    private $precio = null;
    private $idCategoria = null;
    private $idTipoProducto = null;

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
        if ($this->validateMoney($value)) {
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
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchProduct($value)
    {
        $sql = 'SELECT nombre
                FROM producto 
                WHERE nombre ILIKE ? 
                ORDER BY nombre';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createProduct()
    {
       
        $sql = 'INSERT INTO producto(nombre, descripcion, precio, descuento, idCategoria, idTipoProducto)
                VALUES(?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->idCategoria, $this->idTipoProducto);
        return Database::executeRow($sql, $params);
       
    }

    public function readAllProduct()
    {
        $sql = 'SELECT idProducto, nombre, descripcion, precio, descuento, categoria, tipo
                FROM productos INNER JOIN categoria USING(idCategoria) INNER JOIN tipoProducto USING(idTipoProducto)
                ORDER BY idProducto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProduct()
    {
        $sql = 'SELECT nombre
                FROM producto
                WHERE idProducto = ?';
        $params = array($this->nombre);
        return Database::getRow($sql, $params);
    }


   public function updateProduct(){
            $sql='UPDATE producto SET nombre=?, descripcion=?, precio=?, descuento=?, idCategoria=?, idTipoProducto=? WHERE idProducto=?';
            $params=array($this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->idCategoria, $this->idTipoProducto);
            return Database::executeRow($sql, $params);
    }

    public function deleteProduct()
    {
        $sql = 'DELETE FROM producto
                WHERE idProducto = ?';
        $params = array($this->idProducto);
        return Database::executeRow($sql, $params);
    }

}
?>