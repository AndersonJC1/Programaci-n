<?php
session_start();
$id = $_GET['id'];
include "../Controllers/conexion.php";
include "../Css/lib.php";
$sentencia = "SELECT * FROM usuarios WHERE idusuarios=$id ";
$resultado = $conexion->query($sentencia) or die("Error al consultar usuario" . mysqli_error($conexion));
$fila = $resultado->fetch_assoc();
$nombreusuario = $fila['nombreusuario'];
$contrasena = $fila['contrasena'];
$usuario = $fila['usuario'];
$roles = $fila['roles_idroles'];

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
        <form action="../Models/modificarUsuario.php" method="POST">
            <div class="row">
                <div class="form-group col">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">

                    <label for="nombreusuario">Nombre:</label>
                    <input type="text" id="nombreusuario" name="nombreusuario" class="form-control" required
                        value="<?php echo $nombreusuario ?>"><br>

                    <label for="contrasena">Contraseña:</label>
                    <input type="text" id="contrasena" name="contrasena" class="form-control" required
                        value="<?php echo $contrasena ?>"><br>

                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" required
                        value="<?php echo $usuario ?>"><br>

                    <label for="roles_idroles">Rol:</label><br>
                    <select class="form-control" name="roles_idroles">
                        <?php
                        $sentencia = "SELECT * FROM roles";
                        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

                        while ($fila = $resultado->fetch_assoc()) {
                            $selected = "";
                            if ($roles == $fila['idroles']) {
                                $selected = "SELECTED";
                            }
                            echo "<option value='" . $fila['idroles'] . "' $selected>" . $fila['nombrerol'] . "</option>";
                        }
                        ?>
                    </select><br>
                    <div class="col text-center">
                        <button type="button&submit" class="btn btn-primary center-block">Modificar</button>
                    </div>
                </div>
        </form>
</body>

</html>