<?php
	$id = $_REQUEST['id'];
		include 'conexion.php';
		$sentencia="DELETE FROM tipo_evento WHERE idTipo_evento=$id ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Eliminado!!");
	window.location.href='index_tipo_evento.php';
</script>