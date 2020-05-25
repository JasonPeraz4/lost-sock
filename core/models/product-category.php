<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Product_Category extends Validator
{
    // Declaración de atributos (propiedades).
    private $idCategoria = null;
    private $categoria = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCategoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCategoria($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchCategory($value)
    {
        $sql = 'SELECT idCategoria, categoria
                FROM categoria 
                WHERE categoria ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createCategory()
    { 
        $sql = 'INSERT INTO categoria(idCategoria, categoria)
                VALUES(?, ?)';
        $params = array($this->idCategoria, $this->categoria);
        return Database::executeRow($sql, $params);
    }

    public function readAllCategory()
    {
        $sql = 'SELECT idCategoria, categoria
                FROM categoria
                ORDER BY idCategoria';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readCategory()
    {
        $sql = 'SELECT idCategoria, categoria
                FROM categoria
                WHERE idCategoria = ?';
        $params = array($this->idCategoria);
        return Database::getRow($sql, $params);
    }

    public function updateCategory(){
            $sql='UPDATE categoria SET categoria=? WHERE idCategoria=?';
            $params=array($this->idCategoria, $this->categoria);
            return Database::executeRow($sql, $params);
        }

    public function deleteCategory()
    {
        $sql = 'DELETE FROM categoria
                WHERE idCategoria = ?';
        $params = array($this->idCategoria);
        return Database::executeRow($sql, $params);
    }
}
?>