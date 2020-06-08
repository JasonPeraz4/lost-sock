<?php
/*
*	Clase para manejar la tabla cliente de la base de datos. Es clase hija de la clase Validator.
*/
class Cliente extends Validator{
    // 
    private $idCliente = null; 
    private $nombres = null;
    private $estado = null;
    private $apellidos = null; 
    private $email = null;
    private $telefono = null; 
    private $usuario = null;
    

    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setIdCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCliente = $value;
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

    public function setEmail($value)
    {
        if ($this->validateEmail($value)) {
            $this->email = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setTelefono($value)
    {
        if ($this->validatePhoneNumber($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setUsuario($value)
    {
        if ($this->validateUsername($value)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    
/*Función para realizar un select de todos los clientes*/
    public function readAllCliente()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, email, telefono, usuario, estado FROM cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, email, telefono, usuario FROM cliente WHERE idcliente = ?';
        $params = array($this->idCliente);
        return Database::getRow($sql, $params);
    }
    public function readSuscripcionesCliente()
    {
        $sql = 'SELECT s.idsuscripcion, tl.talla, f.frecuencia, ct.categoria, tp.tipo, ps.precio, 
                dp.costoenvio
                FROM suscripcion s 
                JOIN talla tl USING(idtalla)
                JOIN categoria ct USING(idcategoria)
                JOIN plansuscripcion ps USING(idplansuscripcion)
                JOIN tipoproducto tp USING(idtipoproducto)
                JOIN frecuencia f USING(idfrecuencia)
                JOIN direccion dr USING(iddireccion)
                JOIN departamento dp USING(iddepartamento) WHERE s.idcliente = ?';
        $params = array($this->idCliente);
        return Database::getRows($sql, $params);
    }

    public function disableCliente()
    {
        $sql = 'UPDATE cliente 
                SET estado = ?
                WHERE idcliente = ?';
        $params = array($this->estado, $this->idCliente);
        return Database::executeRow($sql, $params);
    }
    
}
?>