<?php
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";

$usuario = "";

if (isset($_POST['buscar'])) {
    $usuario = $_POST['usuario'];

    if (empty($_POST['usuario'])) {
        echo "<script language='JavaScript'>
                alert('Ingresa el usuario por favor');
                location.assign('../Views/tablausuarios.php');
            </script>";
        exit;
    } else {
        $usuario = mysqli_real_escape_string($conexion, $usuario); // Evitar SQL injection
        $sentencia = "SELECT * FROM usuarios INNER JOIN roles ON usuarios.roles_idroles = roles.idroles WHERE usuario LIKE '%$usuario%'";
    }
} else {
    $sentencia = "SELECT * FROM usuarios INNER JOIN roles ON usuarios.roles_idroles = roles.idroles";
}

$resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>
    <div class="container">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <table>
                <tr>
                    <br>
                    <td>
                        <label><b>Usuario:</b></label>
                        <input type="text" name="usuario" class="form-control" value="<?= $usuario ?>">
                    </td>
                    <td>
                        <button type="submit" name="buscar" class="btn btn-warning">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </td>
                    <td>
                        <a href="../Views/tablausuarios.php" class='btn btn-success'>Mostrar todos los usuarios</a>
                    </td>
                    <br>
                </tr>
            </table>
        </form>

        <?php
        //PERMISO AGREGAR
        $idusuario = $_SESSION['idUsuario'];
        $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 1 AND usuarios_idusuarios = $idusuario AND modulo = 1";
        $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
        $filaP = $resultadoP->fetch_assoc();
        $permisoCrear = $filaP['permi'];

        if ($permisoCrear > 0) {
            ?>
            <a href="../Views/agregarusuario.php" class="btn btn-info">Nuevo usuario</a>
            <?php
        }
        ?>

        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Nombre usuario</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                            <th>
                                <form action="../Models/logout.php" method="post">
                                    <button type="submit" name="logout" class="menu-button logout">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </thead>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        //PERMISO VER
                        $idusuario = $_SESSION['idUsuario'];
                        $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 2 AND usuarios_idusuarios = $idusuario AND modulo = 1";
                        $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
                        $filaP = $resultadoP->fetch_assoc();
                        $permisoVer = $filaP['permi'];

                        if ($permisoVer > 0) {
                            echo "<tr>";
                            echo "<td>";
                            echo $fila['idusuarios'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['usuario'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['contrasena'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['nombreusuario'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['nombrerol'];
                            echo "</td>";
                        }

                        //PERMISO ELIMINAR
                        $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 4 AND usuarios_idusuarios = $idusuario AND modulo = 1";
                        $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
                        $filaP = $resultadoP->fetch_assoc();
                        $permisoEliminar = $filaP['permi'];

                        if ($permisoEliminar > 0) {
                            echo "<td><a href='../Models/eliminarusuario.php?id=" . $fila['idusuarios'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
                        }

                        //PERMISO ACTUALIZAR
                        $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 3 AND usuarios_idusuarios = $idusuario AND modulo = 1";
                        $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
                        $filaP = $resultadoP->fetch_assoc();
                        $permisoActualizar = $filaP['permi'];

                        if ($permisoActualizar > 0) {
                            echo "<td><a href='modificarUsuario.php?id=" . $fila['idusuarios'] . "'><button class='btn btn-success'>Modificar</button></a></td>";
                        }

                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
</body>

</html>