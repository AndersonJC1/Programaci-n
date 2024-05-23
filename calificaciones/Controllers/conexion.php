<?php
    $conexion= new mysqli("localhost", "root", "", "calificaciones");
    //Comprobar conexion  127.0.0.1  192.168.1.2
    if(mysqli_connect_errno())
    {
        printf("Fallo la conexion");
    }
    else {
        //printf("Estas conectado");
    }
?>