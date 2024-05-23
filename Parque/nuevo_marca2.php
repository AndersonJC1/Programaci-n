<?php
include 'conexion.php';
	$nombre = $_POST['nombre_marca'];
	
		include 'conexion.php';
		$sentencia= "INSERT INTO marca (nombre_marca) VALUES ('$nombre') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Marca Ingresado Exitosamante!!");
	window.location.href='index_marca.php';
</script>