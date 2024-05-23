<?php
include 'conexion.php';
	$nombre = $_POST['nombre'];

		include 'conexion.php';
		$sentencia= "INSERT INTO tipo_evento (Nombre_tipo_evento) VALUES ('$nombre') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_tipo_evento.php';
</script>