<?php
$id = $_REQUEST['id'];
include '../Controllers/conexion.php';
$sentencia = "DELETE FROM usuarios WHERE idusuarios=$id ";
$conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
?>
<script type="text/javascript">
	alert("Usuario eliminado!!");
	window.location.href = '../Views/tablausuarios.php';
</script>