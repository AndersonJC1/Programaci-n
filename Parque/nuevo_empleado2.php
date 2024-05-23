<?php
include 'conexion.php';
	$documento = $_POST['documento'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
 	$nombre= $_POST['nombre'];
	$tipo_doc=$_REQUEST['tipos'];
	$ciudad=$_REQUEST['ciudad'];
	$ocupacion=$_REQUEST['ocupacion'];

		include 'conexion.php';
		$sentencia= "INSERT INTO empleados (nombre, documento, direccion, telefono, tipo_documento_idtipo_documento, ocupacion_idocupacion, ciudad_idciudad) VALUES ('$nombre', '$documento','$direccion','$telefono',$tipo_doc, $ocupacion, $ciudad) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Empleado Ingresado Exitosamante!!");
	window.location.href='index_empleado.php';
</script>