<?php
$id = $_REQUEST['id'];
include '../Controllers/conexion.php';
$sentencia = "DELETE FROM calificaciones WHERE idcalificacion=$id ";
$conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Calificación eliminada!!");
	window.location.href = '../Views/tablacalificaciones.php';
</script>