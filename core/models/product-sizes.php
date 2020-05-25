<?php
/*
*	Clase para manejar la tabla talla de la base de datos. Es clase hija de Validator.
*/
class Product_Sizes extends Validator
{
    // Declaración de atributos (propiedades).
    private $idTalla = null;
    private $talla = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdTalla($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTalla = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTalla($value)
    {
        if ($this->validateString($value, 1, 5)) {
            $this->talla = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getTalla()
    {
        return $this->talla;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchSize($value)
    {
        $sql = 'SELECT idTalla, talla
                FROM talla 
                WHERE talla ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createSize()
    {
        $sql = 'INSERT INTO talla(idTalla, talla)
                VALUES(?, ?)';
        $params = array($this->idTalla, $this->talla);
        return Database::executeRow($sql, $params);
    }

    public function readAllSize()
    {
        $sql = 'SELECT idTalla, talla
                FROM talla
                ORDER BY idTalla';
        $params = null;
        return Database::getRows($sql, $params);
    }
 
    public function readSize()
    {
        $sql = 'SELECT idTalla, tall
                FROM talla
                WHERE idTalla = ?';
        $params = array($this->idTalla);
        return Database::getRow($sql, $params);
    }

    public function updateSize(){
            $sql='UPDATE talla SET talla=? WHERE idTalla=?';
            $params=array($this->idTalla, $this->talla);
            return Database::executeRow($sql, $params);
        }

    public function deleteSize()
    {
        $sql = 'DELETE FROM talla
                WHERE idTalla = ?';
        $params = array($this->idTalla);
        return Database::executeRow($sql, $params);
    }
}
?>