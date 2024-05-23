<?php
	$conexion= new mysqli("localhost", "root", "", "eventos");
	$conexion->set_charset("utf8");
	//Comprobar conexion
	if(mysqli_connect_errno())
	{
		printf("Fallo la conexion");
	}
	else {
		//printf("Estas conectado");
	}
?>