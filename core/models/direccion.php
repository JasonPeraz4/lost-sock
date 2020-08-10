<?php
/*
*	Clase para manejar la tabla producto de la base de datos. Es clase hija de Validator.
*/

class Direccion extends Validator
{
    // Declaración de atributos (propiedades).
    private $idDireccion = null;
    private $detalleDireccion = null;
    private $idDepartamento = null;
    private $idCliente = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdDireccion($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idDireccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->detalleDireccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDepartamento($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idDepartamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCliente($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idCliente = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getIdDireccion()
    {
        return $this->idDireccion;
    }

    public function getDetalleDireccion()
    {
        return $this->detalleDireccion;
    }

    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /*
    *   Métodos para realizar las operaciones CRUD (search, create, read, update, delete).
    */
    public function createDireccion()
    {
        $sql = 'INSERT INTO direccion(detalleDireccion, idDepartamento, idCliente)
                VALUES(?, ?, ?)';
        $params = array( $this->detalleDireccion, $this->idDepartamento, $this->idCliente );
        return Database::executeRow( $sql, $params );
    }

    public function readAllDirecciones()
    {
        $sql = 'SELECT idDireccion, detalleDireccion, idDepartamento
                FROM direccion
                WHERE idCliente = ? ORDER BY iddireccion';
        $params = array( $this->idCliente );
        return Database::getRows( $sql, $params );
    }

    public function readDireccionesCliente()
    {
        $sql = 'SELECT iddireccion, concat_ws(\', \', detalledireccion, departamento) 
                FROM cliente
                INNER JOIN direccion USING(idcliente) INNER JOIN departamento USING(iddepartamento)
                WHERE cliente.idcliente = ? ORDER BY iddireccion ASC';
        $params = array( $this->idCliente );
        return Database::getRows( $sql, $params );
    }

    public function readAllDepartamento()
    {
        $sql = 'SELECT iddepartamento, departamento
                FROM departamento
                ORDER BY idDepartamento';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readDireccion()
    {
        $sql = 'SELECT iddireccion, detalledireccion, iddepartamento
                FROM direccion 
                WHERE idDireccion = ?';
        $params = array( $this->idDireccion );
        return Database::getRow( $sql, $params );
    }

    public function updateDireccion(){
        $sql = 'UPDATE direccion 
                SET detalledireccion = ?, iddepartamento = ?
                WHERE iddireccion = ?';
        $params=array( $this->detalleDireccion, $this->idDepartamento, $this->idDireccion );
        return Database::executeRow( $sql, $params );
    }

    public function deleteDireccion()
    {
        $sql = 'DELETE FROM direccion
                WHERE idDireccion = ?';
        $params = array( $this->idDireccion );
        return Database::executeRow( $sql, $params );
    }
}