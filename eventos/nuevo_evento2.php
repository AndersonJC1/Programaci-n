<?php
include 'conexion.php';
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$dependencia=$_POST['dependencia'];
	$fecha_r=$_POST['fecha_r'];
	$espfisico=$_POST['espacio_fisico'];
	$hora_i=$_POST['hora_inicio'];
	$hora_f=$_POST['hora_fin'];
	$imp_tecnico=$_POST['implemento_tecnico'];
	$tipo_evento=$_REQUEST['tipo_evento'];

		$sentencia= "INSERT INTO eventos (Codigo_evento,Nombre_evento,Dependencias_idDependencias,Fecha_realizacion,Espacios_fisicos,Hora_inicio,Hora_fin,Implemento_tecnico,Tipo_evento_idTipo_evento) VALUES ('$codigo','$nombre',$dependencia,'$fecha_r','$espfisico','$hora_i','$hora_f','$imp_tecnico',$tipo_evento) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Evento Ingresado Exitosamante!!");
	window.location.href='index_evento.php';
</script>