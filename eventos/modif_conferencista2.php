<?php
	
	$id = $_REQUEST['id'];
	$nombre=$_POST['nombre'];
	$documento=$_POST['documento'];
	$tel=$_POST['telefono'];
	$dir=$_POST['direccion'];
	$abstract=$_POST['abstract'];
	$contenido=$_POST['contenido'];

	include 'conexion.php';
	$sentencia="UPDATE conferencistas SET Nombre_conferencista='$nombre',Numero_identificacion='$documento',Telefono='$tel',Direccion='$dir',Abstract_conferencia='$abstract',Contenido_ponencia='$contenido' WHERE idConferencistas=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_conferencista.php';
</script>