<?php
	$id = $_REQUEST['id'];
		include 'conexion.php';
		$sentencia="DELETE FROM ocupacion WHERE idocupacion=$id ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Producto Eliminado!!");
	window.location.href='index_ocupacion.php';
</script>