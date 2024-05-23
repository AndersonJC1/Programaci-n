<?php
$id = $_REQUEST['id'];
include '../Controllers/conexion.php';
$sentencia = "DELETE FROM materia WHERE idmateria=$id ";
$conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Materia eliminada!!");
	window.location.href = '../Views/tablamateria.php';
</script>