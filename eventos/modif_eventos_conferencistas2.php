<?php
	
	$id = $_REQUEST['id'];
	$evento=$_POST['nombre_evento'];
	$con=$_POST['nombre_conferencista'];

	include 'conexion.php';
	$sentencia="UPDATE eventos_has_conferencistas SET Eventos_idEventos=$evento,Conferencistas_idConferencistas=$con WHERE Eventos_idEventos =$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_eventos_conferencistas.php';
</script>