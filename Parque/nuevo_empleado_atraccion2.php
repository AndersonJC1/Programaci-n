<?php
include 'conexion.php';
	$empleados = $_REQUEST['empleados'];
	$atracciones = $_REQUEST['atracciones'];

		include 'conexion.php';
		$sentencia= "INSERT INTO empleados_has_atracciones (empleados_idempleados, atracciones_idatracciones) VALUES ($empleados,$atracciones) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='index_empleado_atraccion.php';
</script>