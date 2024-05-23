<?php
	
	$id = $_REQUEST['id'];
	$nombre=$_POST['nombre'];
	$lugar=$_POST['lugar'];
	$Fecha=$_POST['Fecha'];
	$hora_i=$_POST['hora_inicio'];
	$hora_f=$_POST['hora_fin'];
	$evento=$_REQUEST['evento'];

	include 'conexion.php';
	$sentencia="UPDATE actividades SET Nombre_actividad='$nombre', Hora_inicio='$hora_i', Hora_fin='$hora_f', Lugar='$lugar', Fecha='$Fecha', Eventos_idEventos=$evento WHERE idActividades=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_actividad.php';
</script>