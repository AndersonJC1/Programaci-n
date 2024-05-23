<?php
include 'conexion.php';
	$clientes = $_REQUEST['clientes'];
	$atracciones = $_REQUEST['atracciones'];

		include 'conexion.php';
		$sentencia= "INSERT INTO clientes_has_atracciones (clientes_idclientes, atracciones_idatracciones) VALUES ($clientes,$atracciones) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='index_cliente_atraccion.php';
</script>