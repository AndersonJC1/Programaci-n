<?php
include 'conexion.php';
	$nombre=$_POST['nombre'];

		$sentencia= "INSERT INTO operaciones (nombre) VALUES ('$nombre')";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Operación Ingresado Exitosamante!!");
	window.location.href='index_operaciones.php';
</script>