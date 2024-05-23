<?php
include 'conexion.php';
	$codigo = $_POST['codigo'];
	$nombre_atraccion = $_POST['nombre_atraccion'];
 	$anio= $_POST['anio'];
	$marcas=$_REQUEST['marcas'];
		include 'conexion.php';
		$sentencia= "INSERT INTO atracciones (codigo, nombre_atraccion, anio, marca_idmarca) VALUES ('$codigo','$nombre_atraccion','$anio',$marcas) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Atracción Ingresado Exitosamante!!");
	window.location.href='index_atraccion.php';
</script>