<?php
include 'conexion.php';
	$empleados = $_REQUEST['idempleados'];
	$atracciones = $_REQUEST['idatracciones'];
	$empleado = $_REQUEST['empleados'];
	$atraccion = $_REQUEST['atracciones'];
		include 'conexion.php';
		$sentencia="UPDATE empleados_has_atracciones SET atracciones_idatracciones=$atraccion WHERE empleados_idempleados=$empleados and atracciones_idatracciones=$atracciones";
		
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='index_empleado_atraccion.php';
</script>