<?php
	
	$id = $_REQUEST['id'];
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$dependencia=$_POST['dependencia'];
	$fecha_r=$_POST['fecha_r'];
	$espfisico=$_POST['espacio_fisico'];
	$hora_i=$_POST['hora_inicio'];
	$hora_f=$_POST['hora_fin'];
	$imp_tecnico=$_POST['implemento_tecnico'];
	$tipo_evento=$_REQUEST['tipo_evento'];

	include 'conexion.php';
	$sentencia="UPDATE eventos SET Codigo_evento='$codigo',Nombre_evento='$nombre',Dependencias_idDependencias=$dependencia,Fecha_realizacion='$fecha_r',Espacios_fisicos='$espfisico',Hora_inicio='$hora_i',Hora_fin='$hora_f',Implemento_tecnico='$imp_tecnico',Tipo_evento_idTipo_evento=$tipo_evento WHERE idEventos=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_evento.php';
</script>