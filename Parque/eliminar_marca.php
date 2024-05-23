<?php
	$id = $_REQUEST['id'];
		include 'conexion.php';
		$sentencia="DELETE FROM marca WHERE idmarca=$id ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Producto Eliminado!!");
	window.location.href='index_marca.php';
</script>