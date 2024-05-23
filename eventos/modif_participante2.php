<?php
	
	$id = $_REQUEST['id'];
	$nombre=$_POST['nombre'];
	$documento=$_POST['documento'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$tipo_participante=$_POST['tipo_participante'];

	include 'conexion.php';
	$sentencia="UPDATE participantes SET Nombre_participante='$nombre',Numero_identificacion='$documento',Telefono='$telefono',Direccion='$direccion',Tipo_participante_idtipo_participante=$tipo_participante WHERE idParticipantes=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_participante.php';
</script>