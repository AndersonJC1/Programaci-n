<?php
session_start();
$id = $_REQUEST['id'];
include "../Controllers/conexion.php";
include "../Css/lib.php";
$sentencia = "SELECT * FROM materia WHERE idmateria=$id ";
$resultado = $conexion->query($sentencia) or die("Error al consultar usuario" . mysqli_error($conexion));
$fila = $resultado->fetch_assoc();
$materia = $fila['nombremateria'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar materia</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>
    <div class="titulo">
        <h1 class="txt">Modificar materia</h1>
    </div>
    <div class="container">
        <form action="../Models/modificarmateria.php" method="POST">
            <div class="row">
                <div class="form-group col">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">

                    <label for="materia">Materia:</label>
                    <input type="text" id="materia" name="materia" class="form-control" required
                        value="<?php echo $materia ?>"><br>


                    <div class="col text-center">
                        <button type="button&submit" class="btn btn-primary center-block">Modificar</button>
                    </div>
                </div>
        </form>
</body>

</html>