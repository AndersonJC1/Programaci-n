<?php
include 'conexion.php';
	$evento=$_POST['nombre_evento'];
	$res=$_POST['nombre_responsable'];

		$sentencia= "INSERT INTO eventos_has_responsables (Eventos_idEventos,Responsables_idResponsables) VALUES ($evento,$res) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_eventos_responsables.php';
</script>