<?php
	$id = $_REQUEST['id'];
		include 'conexion.php';
		$sentencia="DELETE FROM eventos_has_responsables WHERE Eventos_idEventos=$id ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Eliminado!!");
	window.location.href='index_eventos_responsables.php';
</script>