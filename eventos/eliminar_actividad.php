<?php
	$id = $_REQUEST['id'];
		include 'conexion.php';
		$sentencia="DELETE FROM actividades WHERE idActividades=$id ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Eliminado!!");
	window.location.href='index_actividad.php';
</script>