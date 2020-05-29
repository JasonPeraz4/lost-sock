<?php 
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class tipoUsuario extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $tipo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->tipo = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function readAllTipos()
    {
        $sql = 'SELECT idtipousuario, tipo FROM tipoUsuario ORDER BY tipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

}
?>