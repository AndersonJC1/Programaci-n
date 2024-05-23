<?php
include 'conexion.php';
	$nombre=$_POST['nombre'];
	$documento=$_POST['documento'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$tipo_participante=$_POST['tipo_participante'];

		$sentencia= "INSERT INTO participantes (Nombre_participante,Numero_identificacion,Telefono,Direccion,Tipo_participante_idtipo_participante) VALUES ('$nombre','$documento','$telefono','$direccion',$tipo_participante) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Participante Ingresado Exitosamante!!");
	window.location.href='index_participante.php';
</script>