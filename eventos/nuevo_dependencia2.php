<?php
include 'conexion.php';
	$nombre=$_POST['nombre'];

		$sentencia= "INSERT INTO Dependencias (Nombre_dependencia) VALUES ('$nombre')";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Dependencia Ingresada Exitosamante!!");
	window.location.href='index_dependencia.php';
</script>