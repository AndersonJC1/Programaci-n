<?php
//libreria
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asignaturas</title>
  <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>


  <div class="container">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Materia</th>

            <th><a href="../Views/tablacalificaciones.php"> <button type="button" class="btn btn-warning">Gestionar
                  calificación</button> </a> </th>

            <?php
            //PERMISO AGREGAR
            $idusuario = $_SESSION['idUsuario'];
            $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 1 AND usuarios_idusuarios = $idusuario AND modulo = 4";
            $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
            $filaP = $resultadoP->fetch_assoc();
            $permisoCrear = $filaP['permi'];

            if ($permisoCrear > 0) {
              ?>
              <th><a href="../Views/agregarmateria.php"> <button type="button" class="btn btn-info">Nueva materia</button>
                </a> </th>
              <?php
            }
            ?>


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
        $sentencia = "SELECT * FROM materia";
        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

        while ($fila = $resultado->fetch_assoc()) {
          //PERMISO VER
          $idusuario = $_SESSION['idUsuario'];
          $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 2 AND usuarios_idusuarios = $idusuario AND modulo = 4";
          $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
          $filaP = $resultadoP->fetch_assoc();
          $permisoVer = $filaP['permi'];

          if ($permisoVer > 0) {
            echo "<tr>";
            echo "<td>";
            echo $fila['idmateria'];
            echo "</td>";
            echo "<td>";
            echo $fila['nombremateria'];
            echo "</td>";
          }

          //PERMISO ELIMINAR
          $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 4 AND usuarios_idusuarios = $idusuario AND modulo = 4";
          $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
          $filaP = $resultadoP->fetch_assoc();
          $permisoEliminar = $filaP['permi'];

          if ($permisoEliminar > 0) {
            echo "<td><a href='../Models/eliminarmateria.php?id=" . $fila['idmateria'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta materia?\");'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          }

          //PERMISO ACTUALIZAR
          $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 3 AND usuarios_idusuarios = $idusuario AND modulo = 4";
          $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
          $filaP = $resultadoP->fetch_assoc();
          $permisoActualizar = $filaP['permi'];

          if ($permisoActualizar > 0) {
            echo "<td><a href='modificarmateria.php?id=" . $fila['idmateria'] . "'><button class='btn btn-success'>Modificar</button></a></td>";
          }

          echo "</tr>";
        }
        ?>

      </table>

    </div>
</body>

</html>