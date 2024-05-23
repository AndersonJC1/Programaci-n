<?php
include "../Controllers/conexion.php";

$nombreUsuario = $_POST["usuarios"];
$permisos = $_POST["permisos"];
$modulos = $_POST["modulos"];

// Verificar si ya existe una fila con los mismos valores
$sqlVerificar = "SELECT * FROM permisoespecifico WHERE usuarios_idusuarios = $nombreUsuario";

// Si tienes múltiples permisos seleccionados, agrega una condición OR para cada uno
if (is_array($permisos) && !empty($permisos)) {
    $permisosCondicion = " AND (";
    foreach ($permisos as $permiso) {
        $permisosCondicion .= "fk_permisos = $permiso OR ";
    }
    // Elimina el último "OR" y cierra el paréntesis
    $permisosCondicion = rtrim($permisosCondicion, " OR ") . ")";
    $sqlVerificar .= $permisosCondicion;
}

if (is_array($modulos) && !empty($modulos)) {
    // Si tienes múltiples módulos seleccionados, agrega una condición OR para cada uno
    $modulosCondicion = " AND (";
    foreach ($modulos as $modulo) {
        $modulosCondicion .= "modulo = $modulo OR ";
    }
    // Elimina el último "OR" y cierra el paréntesis
    $modulosCondicion = rtrim($modulosCondicion, " OR ") . ")";
    $sqlVerificar .= $modulosCondicion;
}

$resultadoVerificar = $conexion->query($sqlVerificar);

if ($resultadoVerificar->num_rows > 0) {
    // Ya existe una fila con los mismos valores, muestra un mensaje de error
    echo "Ya existe un registro con estos valores. No se puede duplicar.";
    echo '<meta http-equiv="refresh" content="2; url=../Views/agregarpermiso.php">';
} else {
    // No existe una fila con los mismos valores, procede con la inserción
    foreach ($modulos as $modulo) {
        foreach ($permisos as $permiso) {
            $sentencia = "INSERT INTO permisoespecifico (usuarios_idusuarios, fk_permisos, modulo) VALUES ($nombreUsuario, $permiso, $modulo)";
            if ($conexion->query($sentencia) !== TRUE) {
                echo "Error al ingresar los datos: " . $conexion->error;
                exit;
            }
        }
    }

    echo "Ingresado Exitosamente!!";
    echo '<meta http-equiv="refresh" content="2; url=../Views/tablapermisos.php">';
}

// Cierra la conexión de la base de datos
$conexion->close();
?>