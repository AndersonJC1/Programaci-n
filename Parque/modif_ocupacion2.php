<?php
include'conexion.php';
	$idp = $_REQUEST['idocupacion'];
	$nombre = $_POST['nombre_ocupacion'];

		include 'conexion.php';
		$sentencia="UPDATE ocupacion SET nombre_ocupacion='$nombre' WHERE idocupacion=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_ocupacion.php';
</script>