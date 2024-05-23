<?php
include'conexion.php';
	$idp = $_REQUEST['idempleados'];
	$nombre=$_POST['nombre'];
	$direccion= $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$documento=$_POST['documento'];
	$ocupacion=$_REQUEST['ocupaciones'];
	$ciudad= $_REQUEST['ciudades'];
	$tipo_doc=$_REQUEST['tipos'];

		include 'conexion.php';
		$sentencia="UPDATE empleados SET nombre='$nombre',documento='$documento', direccion='$direccion', telefono='$telefono', tipo_documento_idtipo_documento=$tipo_doc,  ocupacion_idocupacion=$ocupacion, ciudad_idciudad=$ciudad WHERE idempleados=$idp ";
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_empleado.php';
</script>