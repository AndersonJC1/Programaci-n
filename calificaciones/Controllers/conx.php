<?php

class conexion extends mysqli
{
    function __construct()
    {
        parent::__construct('localhost', 'root', '', 'crud');
        $this->set_charset('utf8');

        // Verificar la conexión y mostrar un mensaje adecuado
        $this->connect_error === NULL ?
            print('') :
            die('Error al conectarse a la DB: ' . $this->connect_error);
    }
}
?>