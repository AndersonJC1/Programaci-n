<?php
include 'conexion.php';
	$documento = $_POST['documento'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
 	$nombre= $_POST['nombre'];
	$tipo_doc=$_REQUEST['tipos'];

		include 'conexion.php';
		$sentencia= "INSERT INTO clientes (nombre, documento, direccion, telefono, tipo_documento_idtipo_documento) VALUES ('$nombre','$documento','$direccion','$telefono',$tipo_doc) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>

<script type="text/javascript">
	alert("Cliente Ingresado Exitosamante!!");
	window.location.href='index_cliente.php';
</script>