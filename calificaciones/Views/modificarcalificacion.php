<?php
session_start();

$id = $_REQUEST['id'];
include "../Controllers/conexion.php";
include "../Css/lib.php";
$sentencia = "SELECT * FROM calificaciones WHERE idcalificacion=$id ";
$resultado = $conexion->query($sentencia) or die("Error al consultar usuario" . mysqli_error($conexion));
$fila = $resultado->fetch_assoc();
$estudiante = $fila['estudiante'];
$roles = $fila['materia'];
$nota = $fila['nota'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>
    <div class="titulo">
        <h1 class="txt">Modificar usuario</h1>
    </div>
    <div class="container">
        <form action="../Models/modificarcalificacion.php" method="POST">
            <div class="row">
                <div class="form-group col">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                    <label for="materia">Estudiante:</label><br>
                    <select class="form-control" name="estudiante">
                        <?php
                        $sentencia = "SELECT * FROM usuarios WHERE roles_idroles=3";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            $selected = "";
                            if ($roles == $fila['idusuarios']) {
                                $selected = "SELECTED";
                            }
                            echo "<option value='" . $fila['idusuarios'] . "' $selected>" . $fila['nombreusuario'] . "</option>";
                        }
                        ?>
                    </select><br>

                    <label for="materia">Materia:</label><br>
                    <select class="form-control" name="materia">
                        <?php
                        $sentencia = "SELECT * FROM materia";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            $selected = "";
                            if ($roles == $fila['idroles']) {
                                $selected = "SELECTED";
                            }
                            echo "<option value='" . $fila['idmateria'] . "' $selected>" . $fila['nombremateria'] . "</option>";
                        }
                        ?>
                    </select><br>

                    <label for="nombreusuario">Nota:</label>
                    <input type="text" id="nota" name="nota" class="form-control" required
                        value="<?php echo $nota ?>"><br>
                    <div class="col text-center">
                        <button type="button&submit" class="btn btn-primary center-block">Modificar</button>
                    </div>
                </div>
        </form>
</body>

</html>