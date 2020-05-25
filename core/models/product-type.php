<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Product_Type extends Validator
{
    // Declaración de atributos (propiedades).
    private $idTipoProducto = null;
    private $tipo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdTipoProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTipoProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoProducto($value)
    {
        if ($this->validateString($value, 1, 30)) {
            $this->tipo = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdTipoProducto()
    {
        return $this->idTipoProducto;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchProductType($value)
    {
        $sql = 'SELECT idTipoProducto, tipo
                FROM tipoProducto
                WHERE tipo ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createProductType()
    {
        $sql = 'INSERT INTO tipoProducto(idTipoProducto, tipo)
                VALUES(?, ?)';
        $params = array($this->idTipoProducto, $this->tipo);
        return Database::executeRow($sql, $params);
    }
 
    public function readAllProductType()
    {
        $sql = 'SELECT idTipoProducto, tipo
                FROM tipoProducto
                ORDER BY idTipoProducto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProductType()
    {
        $sql = 'SELECT idTipoProducto, tipo
                FROM tipoProducto
                WHERE idTipoProducto = ?';
        $params = array($this->idTipoProducto);
        return Database::getRow($sql, $params);
    }

    public function updateProductType(){
            $sql='UPDATE tipoProducto SET tipo=? WHERE idTipoProducto=?';
            $params=array($this->idTipoProducto, $this->tipo);
            return Database::executeRow($sql, $params);
        }

    public function deleteProductType()
    {
        $sql = 'DELETE FROM tipoProducto
                WHERE idTipoProducto = ?';
        $params = array($this->idTipoProducto);
        return Database::executeRow($sql, $params);
    }
}
?>