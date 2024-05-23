<?php
include '../Controllers/conexion.php';

$estudiante = $_REQUEST['estudiante'];
$materia = $_REQUEST['materia'];
$nota = $_REQUEST['nota'];

$sentencia = "INSERT INTO calificaciones (estudiante, materia, nota) VALUES ($estudiante,$materia,'$nota') ";

$conexion->query($sentencia) or die("Error al ingresar los datos" . mysqli_error($conexion));
?>

<script type="text/javascript">
	alert("Nota Ingresada Exitosamante!!");
	window.location.href = '../Views/tablacalificaciones.php';
</script>