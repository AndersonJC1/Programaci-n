<?php
	
	$id = $_REQUEST['id'];
	$nombre = $_POST['nombre'];

	include 'conexion.php';
	$sentencia="UPDATE tipo_participante SET Nombre_tipo_participante='$nombre' WHERE idtipo_participante=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_tipo_participante.php';
</script>