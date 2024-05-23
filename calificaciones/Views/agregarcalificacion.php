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
        <h1 class="txt">Agregar Calificación</h1>
    </div>
    <div class="container">
        <form action="../Models/agregarcalificacion.php" method="POST">
            <div class="row">
                <div class="form-group col">

                    <label>Estudiante:</label><br>
                    <select class="form-control" name="estudiante">
                        <?php
                        $sentencia = "SELECT * FROM usuarios WHERE roles_idroles=3";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila['idusuarios'] . "'>" . $fila['nombreusuario'] . "</option>";
                        }
                        ?>
                    </select><br>


                    <label>Materia:</label><br>
                    <select class="form-control" name="materia">
                        <?php
                        $sentencia = "SELECT * FROM materia";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila['idmateria'] . "'>" . $fila['nombremateria'] . "</option>";
                        }
                        ?>
                    </select><br>


                    <label for="Nota">Nota:</label>
                    <input type="number" id="Nota" name="nota" required class="form-control" step="any"><br>



                    <div class="col text-center">
                        <button type="button&submit" class="btn btn-primary center-block">Agregar</button>
                    </div>

                </div>
        </form>
</body>

</html>