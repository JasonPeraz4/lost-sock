<?php
/*
*	Clase para manejar la tabla detalle_compra de la base de datos. Es clase hija de la clase Validator.
*/
class Orden extends Validator{
    // 
    private $idCompra = null;
    private $idDetalleCompra = null;
    private $nombre = null;
    private $fechaCompra = null;
    private $fechaEnvio = null; 
    private $total = null;
    private $estado = null; 
    private $nombres = null;
    private $apellidos = null;
    

    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setIdCompra($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCompra = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalleCompra($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idDetalleCompra = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateString($value, 1, 75)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->total = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setEstado($value)
    {
        if ($this->validateString($value, 1, 15)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaCompra($value)
    {
        if ($this->validateDate($value)) {
            $this->fechaCompra = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaEnvio($value)
    {
        if ($this->validateDate($value)) {
            $this->fechaEnvio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCompra()
    {
        return $this->idCompra;
    }

    public function getIdDetalleCompra()
    {
        return $this->idDetalleCompra;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    
    // Método para verificar si existe un pedido pendiente del cliente para seguir comprando, de lo contrario crea uno.
    public function readCompra()
    {
        $sql = 'SELECT idCompra FROM compra WHERE idCliente = ? AND idEstadoCompra = 1';
        $params = array($this->idCliente);
        if ($data = Database::getRow($sql, $params)) {
            $this->idCompra = $data['idcompra'];
            return true;
        } else {
            $sql = 'INSERT INTO pedidos(id_cliente)
                    VALUES(?)';
            $params = array($this->cliente);
            if (Database::executeRow($sql, $params)) {
                // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
                $this->id_pedido = Database::getLastRowId();
                return true;
            } else {
                return false;
            }
        }
    }
    
/*Función para realizar un select de todos los clientes*/
    public function readAllOrden()
    {
        $sql = 'SELECT idcompra, nombre, fechacompra, fechaenvio, total, ec.estado, nombres, apellidos
                FROM detallecompra
                JOIN compra USING(idcompra)
                JOIN estadocompra ec USING(idestadocompra)
                JOIN cliente USING(idcliente)
                JOIN producto USING(idproducto)';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneOrden()
    {
        $sql = 'SELECT idcompra, nombre, fechacompra, fechaenvio, total, ec.estado, ec.idEstadoCompra, nombres, apellidos
                FROM detallecompra
                JOIN compra USING(idcompra)
                JOIN estadocompra ec USING(idestadocompra)
                JOIN cliente USING(idcliente)
                JOIN producto USING(idproducto)
                WHERE idCompra = ?';
        $params = array($this->idCompra);
        return Database::getRow($sql, $params);
    }

    public function disableOrden()
    {
        $sql = 'UPDATE compra
                SET idEstadoCompra = ?
                WHERE idCompra = ?';
        $params = array($this->estado, $this->idCompra);
        return Database::executeRow($sql, $params);
    }
    
}
?>