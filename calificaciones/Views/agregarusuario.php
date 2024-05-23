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
        <h1 class="txt">Agregar usuario</h1>
    </div>
    <div class="container">
        <form action="../Models/agregarUsuario.php" method="POST">
            <div class="row">
                <div class="form-group col">

                    <label for="nombre">Nombre y Apellido:</label>
                    <input type="text" id="nombreusuario" name="nombreusuario" required class="form-control"><br>

                    <label for="contrasena">Contraseña:</label>
                    <input type="text" id="contrasena" name="contrasena" required class="form-control"><br>

                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required class="form-control"><br>

                    <label>Rol:</label><br>
                    <select class="form-control" name="roles">
                        <?php
                        $sentencia = "SELECT * FROM roles";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option value='" . $fila['idroles'] . "'>" . $fila['nombrerol'] . "</option>";
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