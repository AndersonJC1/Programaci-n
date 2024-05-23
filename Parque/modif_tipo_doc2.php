<?php
include'conexion.php';
	$idp = $_REQUEST['idtipo_documento'];
	$nombre = $_POST['nombre_tipo_documento'];

		include 'conexion.php';
		$sentencia="UPDATE tipo_documento SET  nombre_tipo_documento='$nombre' WHERE idtipo_documento=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_tipo_documento.php';
</script>