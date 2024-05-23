<?php
include 'conexion.php';
	$nombre = $_POST['nombre_ocupacion'];
	
		include 'conexion.php';
		$sentencia= "INSERT INTO ocupacion (nombre_ocupacion) VALUES ('$nombre') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ocupación Ingresada Exitosamante!!");
	window.location.href='index_ocupacion.php';
</script>