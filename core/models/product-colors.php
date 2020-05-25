<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Product_Colors extends Validator
{
    // Declaración de atributos (propiedades).
    private $idColor = null;
    private $color = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdColor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idColor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setColor($value)
    {
        if ($this->validateString($value, 1, 20)) {
            $this->color = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdColor()
    {
        return $this->idColor;
    }

    public function getColor()
    {
        return $this->color;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchColor($value)
    {
        $sql = 'SELECT idColor, color
                FROM color 
                WHERE color ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createColor()
    {
        $sql = 'INSERT INTO color(idColor, color)
                VALUES(?, ?)';
        $params = array($this->idColor, $this->color);
        return Database::executeRow($sql, $params);
    }

    public function readAllColor()
    {
        $sql = 'SELECT idColor, color
                FROM color
                ORDER BY idColor';
        $params = null;
        return Database::getRows($sql, $params);
    }

    // public function readProductosCategoria()
    // {
    //     $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
    //             FROM productos INNER JOIN categorias USING(id_categoria)
    //             WHERE id_categoria = ? AND estado_producto = true
    //             ORDER BY nombre_producto';
    //     $params = array($this->categoria);
    //     return Database::getRows($sql, $params);
    // }

    public function readColor()
    {
        $sql = 'SELECT idColor, color
                FROM color
                WHERE idColor = ?';
        $params = array($this->idColor);
        return Database::getRow($sql, $params);
    }

    // public function updateProducto()
    // {
    //     if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
    //         $sql = 'UPDATE productos
    //                 SET imagen_producto = ?, nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, estado_producto = ?, id_categoria = ?
    //                 WHERE id_producto = ?';
    //         $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
    //     } else {
    //         $sql = 'UPDATE productos
    //                 SET nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, estado_producto = ?, id_categoria = ?
    //                 WHERE id_producto = ?';
    //         $params = array($this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
    //     }
    //     return Database::executeRow($sql, $params);
    /// }

    public function updateColor(){
            $sql='UPDATE color SET color=? WHERE idColor=?';
            $params=array($this->idColor, $this->color);
            return Database::executeRow($sql, $params);
    }

    public function deleteColor()
    {
        $sql = 'DELETE FROM color
                WHERE idColor = ?';
        $params = array($this->idColor);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    // public function cantidadProductosCategoria()
    // {
    //     $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
    //             FROM productos INNER JOIN categorias USING(id_categoria)
    //             GROUP BY id_categoria, nombre_categoria';
    //     $params = null;
    //     return Database::getRows($sql, $params);
    // }
}
?>