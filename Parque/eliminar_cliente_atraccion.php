<?php
	$id = $_REQUEST['id'];
		include 'conexion.php';
		$sentencia="DELETE FROM clientes_has_atracciones WHERE clientes_idclientes=$id ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Producto Eliminado!!");
	window.location.href='index_cliente_atraccion.php';
</script>