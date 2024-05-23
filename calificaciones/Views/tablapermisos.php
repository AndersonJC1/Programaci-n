<?php
//libreria.
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permisos</title>
  <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
  <script type="text/javascript">

  </script>
</head>

<body>
  <div class="container">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre usuario</th>
            <th scope="col">Rol</th>
            <th scope="col">Permiso Especifico</th>
            <th scope="col">Módulo</th>
            <th scope="col">
              <?php

              $idusuario = $_SESSION['idUsuario'];
              $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 1 AND usuarios_idusuarios = $idusuario AND modulo = 2";
              $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
              $filaP = $resultadoP->fetch_assoc();
              $permisoCrear = $filaP['permi'];
              if ($permisoCrear > 0) {
                ?>
                <a href="../Views/agregarpermiso.php"> <button type="button" class="btn btn-info">Nuevo Permiso</button>
                </a>
                <?php
              }

              ?>
            </th>
          </tr>
        </thead>

        <?php

        $sentencia = "SELECT * FROM permisoespecifico 
        INNER JOIN usuarios ON permisoespecifico.usuarios_idusuarios = usuarios.idusuarios
        INNER JOIN permisos ON permisoespecifico.fk_permisos = permisos.idpermisos
        INNER JOIN roles ON usuarios.roles_idroles = roles.idroles
        INNER JOIN modulo ON permisoespecifico.modulo = modulo.idmodulo ORDER BY usuarios.nombreusuario"; // Corrección en la última línea
        
        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

        while ($fila = $resultado->fetch_assoc()) {
          $idusuario = $_SESSION['idUsuario'];
          $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 2 AND usuarios_idusuarios = $idusuario AND modulo = 2";
          $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
          $filaP = $resultadoP->fetch_assoc();
          $permisoVer = $filaP['permi'];
          if ($permisoVer > 0) {
            echo "<td>";
            echo $fila['nombreusuario'];
            echo "</td>";
            echo "<td>";
            echo $fila['nombrerol'];
            echo "</td>";
            echo "<td>";
            echo $fila['nombrepermiso'];
            echo "</td>";
            echo "<td>";
            echo $fila['nombremodulo'];
            echo "</td>";
          }


          $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 4 AND usuarios_idusuarios = $idusuario AND modulo = 2";
          $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
          $filaP = $resultadoP->fetch_assoc();
          $permisoCrear = $filaP['permi'];
          if ($permisoCrear > 0) {
            echo "<td><a href='../Models/eliminarpermiso.php?id=" . $fila['idpermisoespecifico'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";

          }
          echo "</tr>";
        }
        ?>
        <form action="../Models/logout.php" method="post">
          <button type="submit" name="logout" class="menu-button logout">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
          </button>
        </form>
      </table>
    </div>
  </div>
</body>

</html>