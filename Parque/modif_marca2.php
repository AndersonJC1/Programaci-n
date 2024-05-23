<?php
include'conexion.php';
	$idp = $_REQUEST['idmarca'];
	$nombre_marca = $_POST['nombre_marca'];

		include 'conexion.php';
		$sentencia="UPDATE marca SET  nombre_marca='$nombre_marca' WHERE idmarca=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_marca.php';
</script>