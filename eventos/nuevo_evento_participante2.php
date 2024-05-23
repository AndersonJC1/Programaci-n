<?php
include 'conexion.php';
	$evento=$_POST['nombre_evento'];
	$par=$_POST['nombre_participante'];

		$sentencia= "INSERT INTO eventos_has_participantes (Eventos_idEventos,Participantes_idParticipantes) VALUES ($evento,$par) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_eventos_participantes.php';
</script>