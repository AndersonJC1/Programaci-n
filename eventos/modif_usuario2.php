<?php
	
	$id = $_REQUEST['id'];
	$user = $_REQUEST['user'];
	$pass = md5($_REQUEST['pass']);

	include 'conexion.php';
	$sentencia="UPDATE usuarios SET usuario='$user', 	contrasena='$pass' WHERE idusuarios=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_usuario.php';
</script>