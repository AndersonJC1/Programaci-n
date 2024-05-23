<?php
	
	$id = $_REQUEST['id'];
	$evento=$_POST['nombre_evento'];
	$res=$_POST['nombre_responsable'];

	include 'conexion.php';
	$sentencia="UPDATE eventos_has_responsables SET Eventos_idEventos=$evento,Responsables_idResponsables=$res WHERE Eventos_idEventos =$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_eventos_responsables.php';
</script>