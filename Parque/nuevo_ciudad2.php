<?php
include 'conexion.php';
	$nombre = $_POST['nombre_ciudad'];
		include 'conexion.php';
		$sentencia= "INSERT INTO ciudad (nombre_ciudad) VALUES ('$nombre') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='index_ciudad.php';
</script>