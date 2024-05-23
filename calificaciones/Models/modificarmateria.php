<?php
include '../Controllers/conexion.php';

$id = $_REQUEST['id'];
$materia = $_POST['materia'];

$sentencia = "UPDATE materia SET nombremateria = '$materia' WHERE idmateria = $id";

if ($conexion->query($sentencia) === TRUE) {
    echo "Datos actualizados correctamente.";

    // Redireccionar después de un segundo
    echo '<meta http-equiv="refresh" content="1; url=../Views/tablamateria.php">';
} else {
    echo "Error al actualizar datos: " . $conexion->error;
}

$conexion->close();
?>