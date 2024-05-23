<?php
include 'conexion.php';
	$nombre=$_POST['nombre'];
	$documento=$_POST['documento'];
	$tel=$_POST['telefono'];
	$dir=$_POST['direccion'];
	$abstract=$_POST['abstract'];
	$contenido=$_POST['contenido'];

		$sentencia= "INSERT INTO conferencistas (Nombre_conferencista,Numero_identificacion,Telefono,Direccion,Abstract_conferencia,Contenido_ponencia) VALUES ('$nombre','$documento','$tel','$dir','$abstract','$contenido') ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_conferencista.php';
</script>
