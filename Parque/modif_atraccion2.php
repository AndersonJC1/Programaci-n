<?php
include'conexion.php';
	$idp = $_REQUEST['idatracciones'];
	$codigo= $_POST['codigo'];
	$nombre = $_POST['nombre_atraccion'];
	$anio= $_POST['anio'];
	$marcas=$_REQUEST['marcas'];

		include 'conexion.php';
		$sentencia="UPDATE atracciones SET codigo='$codigo', nombre_atraccion='$nombre', anio='$anio', marca_idmarca=$marcas WHERE idatracciones=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_atraccion.php';
</script>