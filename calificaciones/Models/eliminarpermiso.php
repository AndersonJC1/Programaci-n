<?php
$id = $_REQUEST['id'];
include '../Controllers/conexion.php';
$sentencia = "DELETE FROM permisoespecifico WHERE idpermisoespecifico=$id ";
$conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Permiso eliminado!!");
	window.location.href = '../Views/tablapermisos.php';
</script>