<?php
include 'conexion.php';
	$nombre = $_POST['nombre'];
		include 'conexion.php';
		$sentencia= "INSERT INTO tipo_participante (Nombre_tipo_participante) VALUES ('$nombre') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_tipo_participante.php';
</script>