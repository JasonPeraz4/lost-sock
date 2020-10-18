<?php
/*
*	Clase para manejar la tabla cliente de la base de datos. Es clase hija de la clase Validator.
*/
class Cliente extends Validator{
    // 
    private $idCliente = null; 
    private $nombres = null;
    private $apellidos = null; 
    private $email = null;
    private $telefono = null; 
    private $usuario = null;
    private $estado = null;
    private $estadoError = null;
    private $clave = null;
    private $token = null;
    private $diff_days = null;
    private $intentos = 0;
    private $imagen = null;
    private $archivo = null;
    private $ruta = '../../../resources/img/clientes/';

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

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($value >= 0) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setToken($value)
    {
        if ($this->validateToken($value)) {
            $this->token = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
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

    public function getClave()
    {
        return $this->clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getEstadoError()
    {
        return $this->estadoError;
    }
    
    public function getToken()
    {
        return $this->token;
    }

    public function getDiffDays()
    {
        return $this->diff_days;
    }

    public function getIntentos()
    {
        return $this->intentos;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para gestionar la cuenta del cliente.
    */

    public function checkExist($column, $value){
        switch ($column) {
            case 'email':
                $sql = 'SELECT * FROM cliente WHERE email = ?';
                break;
            case 'telefono':
                $sql = 'SELECT * FROM cliente WHERE telefono = ?';
                break;
            case 'usuario':
                $sql = 'SELECT * FROM cliente WHERE usuario = ?';
                break;
            default:
                # code...
                break;
        }
        $params = array($value);
        if ($data = Database::getRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkProfile($column, $value){
        switch ($column) {
            case 'email':
                $sql = 'SELECT * FROM cliente WHERE email = ? AND idcliente <> ?';
                break;
            case 'telefono':
                $sql = 'SELECT * FROM cliente WHERE telefono = ? AND idcliente <> ?';
                break;
            case 'usuario':
                $sql = 'SELECT * FROM cliente WHERE usuario = ? AND idcliente <> ?';
                break;
            default:
                # code...
                break;
        }
        $params = array($value, $this->idCliente);
        if ($data = Database::getRow($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEstado( $email ){
        $sql = 'SELECT estado FROM cliente WHERE email = ?';
        $params = array($email);
        $data = Database::getRow($sql, $params);
        // Se compara el número del estado para establecer un mensaje de error.
        switch ($data['estado']) {
            case 1:
                $this->estadoError = 'Existe una sesión activa en esta cuenta';
                return false;
                break;
            case 2:
                $this->estadoError = 'La cuenta se encuentra bloqueada temporalmente';
                return false;
                break;
            case 3:
                $this->estadoError = 'La cuenta ha sido deshabilitada';
                return false;
                break;
            default:
                return true;
        }
    }

    public function updateEstado()
    {
        $sql = 'UPDATE cliente 
                SET estado = ?
                WHERE idcliente = ?';
        $params = array($this->estado, $this->idCliente);
        return Database::executeRow($sql, $params);
    }

    public function checkEmail( $email ){
        $sql = 'SELECT idCliente, nombres, apellidos, telefono, email, usuario, imagen, intentos_inicio_sesion, abs(fecha_clave :: date - NOW() :: date ) as diff_days FROM cliente WHERE email = ?';
        $params = array($email);
        if ($data = Database::getRow($sql, $params)) {
            $this->idCliente = $data['idcliente'];
            $this->intentos = $data['intentos_inicio_sesion'];
            if ($this->email == $data['email']) {
                $this->intentos++;
            }
            $this->email = $email;
            $this->nombres = $data['nombres'];
            $this->apellidos = $data['apellidos'];
            $this->telefono = $data['telefono'];
            $this->usuario = $data['usuario'];
            $this->imagen = $data['imagen'];
            $this->diff_days = $data['diff_days'];
            return true;
        } else {
            return false;
        }
    }

    public function checkClave( $clave )
    {
        $sql = 'SELECT clave FROM cliente WHERE idcliente = ?';
        $params = array($this->idCliente);
        $data = Database::getRow($sql, $params);
        if (password_verify( $clave, $data[ 'clave'] )) {
            $this->intentos = 0;
            $this->handleIntentosInicio();
            return true;
        } else {
            if ($this->intentos == 3) {
                $this->setEstado(2);
                $this->updateEstado();
                $this->intentos = 0;
            }
            $this->handleIntentosInicio();
            return false;
        }
    }

    public function handleIntentosInicio( )
    {
        $sql = 'UPDATE cliente SET intentos_inicio_sesion = ? WHERE idcliente = ?';
        $params = array($this->intentos, $this->idCliente);
        Database::executeRow($sql, $params);
    }

    public function addToken()
    {
        $this->token = strtoupper(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
        $sql = 'UPDATE cliente 
                SET token_recuperar_clave = ?, fecha_token = DEFAULT 
                WHERE idcliente = ?';
        $params = array($this->token, $this->idCliente);
        return Database::executeRow($sql, $params);
    }

    public function checkToken(){
        $sql = 'SELECT idcliente FROM cliente WHERE token_recuperar_clave = ? AND fecha_token >= NOW()';
        $params = array($this->token);
        if ($data = Database::getRow($sql, $params)) {
            $this->idCliente = $data['idcliente'];
            return true;
        } else {
            return false;
        }
    }

    public function createCliente()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO cliente( nombres, apellidos, email, telefono, usuario, clave)
        VALUES ( ?, ?, ?, ?, ?, ? )';
        $params = array( $this->nombres, $this->apellidos, $this->email, $this->telefono, $this->usuario, $hash );
        if (Database::executeRow($sql, $params)) {  
            // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
            $this->idCliente = Database::getLastRowId();
            return true;
        } else {
            return false;
        }
    }

    public function editProfile()
    {   
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE cliente 
                SET imagen = ?, nombres = ?, apellidos = ?, telefono = ?, email = ?, usuario = ?
                WHERE idcliente = ?';
            $params = array( $this->imagen, $this->nombres, $this->apellidos, $this->telefono, $this->email, $this->usuario, $this->idCliente);
        } else {
            $sql = 'UPDATE cliente 
                SET nombres = ?, apellidos = ?, telefono = ?, email = ?, usuario = ?
                WHERE idcliente = ?';
            $params = array($this->nombres, $this->apellidos, $this->telefono, $this->email, $this->usuario, $this->idCliente);
        }
        return Database::executeRow($sql, $params);
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente 
                SET clave = ?, fecha_clave = NOW() WHERE idcliente = ?';
        $params = array($hash, $this->idCliente);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    /*Función para realizar un select de todos los clientes*/
    public function readAllCliente()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, email, telefono, usuario, estado, imagen FROM cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT idcliente, nombres, apellidos, email, telefono, usuario, imagen FROM cliente WHERE idcliente = ?';
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
    
    //Funcion de reporte
    public function gananciasCliente()
    {
        $sql = "SELECT concat_ws(' ', nombres, apellidos) AS nombre, SUM(precio*cantidad) AS total , SUM(cantidad) AS cantidad 
                FROM cliente
                JOIN compra USING(idcliente) JOIN detallecompra USING(idcompra)
                GROUP BY concat_ws(' ', nombres, apellidos), cliente.idcliente, costoenvio 
                ORDER BY SUM(precio*cantidad) DESC
        ";
        $params = null;
        return Database::getRows($sql, $params);
    }
}
?>