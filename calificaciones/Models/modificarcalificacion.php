<?php
include '../Controllers/conexion.php';

$id = $_REQUEST['id'];
$estudiante = $_POST['estudiante'];
$materia = $_POST['materia'];
$nota = $_POST['nota'];

$sentencia = "UPDATE calificaciones SET estudiante = $estudiante, materia = $materia, nota = '$nota' WHERE idcalificacion = $id";

if ($conexion->query($sentencia) === TRUE) {
    echo "Datos actualizados correctamente.";

    // Redireccionar después de un segundo
    echo '<meta http-equiv="refresh" content="1; url=../Views/tablacalificaciones.php">';
} else {
    echo "Error al actualizar datos: " . $conexion->error;
}

$conexion->close();
?>