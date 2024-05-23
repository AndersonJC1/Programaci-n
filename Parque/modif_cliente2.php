<?php
include'conexion.php';
	$idp = $_REQUEST['idclientes'];
	$documento = $_POST['documento'];
	$telefono= $_POST['telefono'];
	$nombre= $_POST['nombre'];
	$direccion= $_POST['direccion'];
	$tipo_doc=$_REQUEST['tipo_doc'];

		include 'conexion.php';
		$sentencia="UPDATE clientes SET nombre='$nombre', documento='$documento', direccion='$direccion', telefono='$telefono', tipo_documento_idtipo_documento=$tipo_doc WHERE idclientes=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_cliente.php';
</script>