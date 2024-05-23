<?php
include 'conexion.php';
	$nombre = $_POST['nombre_tipo_documento'];
	
		include 'conexion.php';
		$sentencia= "INSERT INTO tipo_documento (nombre_tipo_documento) VALUES ('$nombre') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Tipo de documento Ingresado Exitosamante!!");
	window.location.href='index_tipo_documento.php';
</script>