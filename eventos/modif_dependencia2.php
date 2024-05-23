<?php
	
	$id = $_REQUEST['id'];
	$nombre=$_POST['nombre'];

	include 'conexion.php';
	$sentencia="UPDATE Dependencias  SET Nombre_dependencia='$nombre' WHERE idDependencias=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_dependencia.php';
</script>