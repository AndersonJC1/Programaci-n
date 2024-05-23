<?php
include'conexion.php';
	$idp = $_REQUEST['idciudad'];
	$nombre = $_POST['nombre_ciudad'];

		include 'conexion.php';
		$sentencia="UPDATE ciudad SET nombre_ciudad='$nombre' WHERE idciudad=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_ciudad.php';
</script>