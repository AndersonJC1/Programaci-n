<?php
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>
    <div class="titulo">
        <h1 class="txt">Agregar Permiso</h1>
    </div>
    <div class="container">
        <form action="../Models/agregarpermiso.php" method="POST">
            <div class="row">
                <div class="form-group col">

                    <label style="font-size: 20px;">Usuario:</label><br>
                    <select class="form-control" name="usuarios">
                        <?php
                        $sentencia = "SELECT * FROM usuarios";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila['idusuarios'] . "'>" . $fila['idusuarios'] . " - " . $fila['nombreusuario'] . "</option>";
                        }
                        ?>
                    </select><br>

                    <label style="font-size: 20px;">Permisos:</label><br>
                    <?php
                    $sentencia = "SELECT * FROM permisos";
                    $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                    while ($fila = $resultado->fetch_assoc()) {
                        echo '<input type="checkbox" name="permisos[]" value="' . $fila['idpermisos'] . '"> ' . $fila['nombrepermiso'] . '<br>';
                    }
                    ?>
                    </select><br>

                    <label style="font-size: 20px;">Módulos:</label><br>
                    <?php
                    $sentencia = "SELECT * FROM modulo";
                    $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                    while ($fila = $resultado->fetch_assoc()) {
                        echo '<input type="checkbox" name="modulos[]" value="' . $fila['idmodulo'] . '"> ' . $fila['nombremodulo'] . '<br>';
                    }
                    ?>

                    </select><br>
                    <div class="col text-center">
                        <button type="button&submit" class="btn btn-primary center-block">Agregar</button>
                    </div>
                </div>
        </form>
</body>

</html>