<?php
include 'conexion.php';
	$nombre=$_POST['nombre'];
	$lugar=$_POST['lugar'];
	$Fecha=$_POST['Fecha'];
	$hora_i=$_POST['hora_inicio'];
	$hora_f=$_POST['hora_fin'];
	$evento=$_REQUEST['evento'];

		$sentencia= "INSERT INTO actividades (Nombre_actividad,Hora_inicio,Hora_fin,Lugar,Fecha,Eventos_idEventos) VALUES ('$nombre','$hora_i','$hora_f','$lugar','$Fecha',$evento) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresada Exitosamante!!");
	window.location.href='index_actividad.php';
</script>