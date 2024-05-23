<?php
	
	$id = $_REQUEST['id'];
	$evento=$_POST['nombre_evento'];
	$par=$_POST['nombre_participante'];

	include 'conexion.php';
	$sentencia="UPDATE eventos_has_participantes SET Eventos_idEventos=$evento,Participantes_idParticipantes=$par WHERE Eventos_idEventos =$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_eventos_participantes.php';
</script>