<?php
/*
*	Clase para manejar la tabla producto de la base de datos. Es clase hija de Validator.
*/

class DetalleProducto extends Validator
{
    // Declaración de atributos (propiedades).
    private $idDetalleProducto = null;
    private $existencia = null;
    private $idTalla = null;
    private $idProducto = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdDetalleProducto($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idDetalleProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setExistencia($value)
    {
        if ( $value > 0 ) {
            $this->existencia += $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTalla($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idTalla = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdProducto($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getIdDetalleProducto()
    {
        return $this->idDetalleProducto;
    }

    public function getExistencias()
    {
        return $this->existencia;
    }

    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /*
    *   Métodos para realizar las operaciones CRUD (search, create, read, update, delete).
    */

    // Método para verificar si existe un pedido pendiente del cliente para seguir comprando, de lo contrario crea uno.
    public function readDetalleProducto()
    {
        $sql = 'SELECT iddetalleproducto, existencia FROM detalleproducto WHERE idtalla = ? AND idproducto = ?';
        $params = array($this->idTalla, $this->idProducto);
        if ($data = Database::getRow($sql, $params)) {
            $this->idDetalleProducto = $data['iddetalleproducto'];
            $this->existencia = $data['existencia'];
            return true;
        } else {
            $sql = 'INSERT INTO detalleproducto (existencia, idtalla, idproducto )
                    VALUES( 0, ?, ? )';
            $params = array($this->idTalla, $this->idProducto);
            if (Database::executeRow($sql, $params)) {
                // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
                $this->idDetalleProducto = Database::getLastRowId();
                $this->existencia = 0;
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function readAllDetalleProducto()
    {
        $sql = 'SELECT existencia, talla 
                FROM detalleProducto INNER JOIN talla USING(idtalla)
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::getRows( $sql, $params );
    }

    public function readOneDetalleProducto()
    {
        $sql = 'SELECT idtalla, talla 
                FROM detalleProducto INNER JOIN talla USING(idtalla)
                WHERE idProducto = ? AND existencia > 0';
        $params = array( $this->idProducto );
        return Database::getRows( $sql, $params );
    }

    public function updateDetalleProducto(){
        $sql = 'UPDATE detalleproducto 
                SET existencia = ?
                WHERE idDetalleProducto = ?';
        $params=array( $this->existencia, $this->idDetalleProducto );
        return Database::executeRow( $sql, $params );
    }
}