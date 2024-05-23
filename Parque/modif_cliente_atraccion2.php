<?php
include 'conexion.php';
	$clientes = $_REQUEST['idclientes'];
	$atracciones = $_REQUEST['idatracciones'];
	$cliente = $_REQUEST['clientes'];
	$atraccion = $_REQUEST['atracciones'];
		include 'conexion.php';
		$sentencia="UPDATE clientes_has_atracciones SET atracciones_idatracciones=$atraccion WHERE clientes_idclientes=$clientes and atracciones_idatracciones=$atracciones";
		
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='index_cliente_atraccion.php';
</script>