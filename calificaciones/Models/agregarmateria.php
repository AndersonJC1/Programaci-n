<?php
include '../Controllers/conexion.php';

$materia = $_REQUEST['materia'];

$sentencia = "INSERT INTO materia (nombremateria) VALUES ('$materia') ";

$conexion->query($sentencia) or die("Error al ingresar los datos" . mysqli_error($conexion));

?>
<script type="text/javascript">
	alert("Materia Ingresada Exitosamante!!");
	window.location.href = '../Views/tablamateria.php';
</script>