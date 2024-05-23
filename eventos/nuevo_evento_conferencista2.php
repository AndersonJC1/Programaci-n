<?php
include 'conexion.php';
	$evento=$_POST['nombre_evento'];
	$con=$_POST['nombre_conferencista'];
	$sentencia= "INSERT INTO eventos_has_conferencistas (Eventos_idEventos,Conferencistas_idConferencistas) VALUES ($evento,$con) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_eventos_conferencistas.php';
</script>