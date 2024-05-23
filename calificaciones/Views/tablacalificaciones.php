<?php
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calificaciones</title>
  <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>
  <div class="container">
    <div class="table-responsive">
      <table class="table">

        <thead>
          <tr>
            <!-- Botón de descarga reporte de notas-->

            <th scope="col">ID</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Asignatura</th>
            <th>Nota</th>
            <?php
            if (isset($_SESSION['rol']) && $_SESSION['rol'] === "Administrador" or $_SESSION['rol'] === "Instructor") {
              ?>
              <th><a href="../Views/tablamateria.php"><button type="button" class="btn btn-warning">Gestionar
                    materia</button></a></th>
              <?php
            } elseif (isset($_SESSION['rol']) && $_SESSION['rol'] === "Estudiante") {
              ?>
              <div class="navbar">
                <?php
                if (isset($_SESSION['username'])) {
                  echo "<p>Bienvenido, " . $_SESSION['username'] . "!</p>";
                } else {
                  echo "<p>Usuario no autenticado.</p>";
                }
                if (isset($_SESSION['rol'])) {
                  echo "<p>Rol: " . $_SESSION['rol'] . "</p>";
                } else {
                  echo "<p>Usuario no autenticado.</p>";
                }
                ?>
              </div>
              <?php
            }
            // PERMISO AGREGAR
            $idusuario = $_SESSION['idUsuario'];
            $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 1 AND usuarios_idusuarios = $idusuario AND modulo = 3";
            $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
            $filaP = $resultadoP->fetch_assoc();
            $permisoCrear = $filaP['permi'];

            if ($permisoCrear > 0) {
              ?>
              <th><a href="../Views/agregarcalificacion.php"><button type="button" class="btn btn-info">Nueva
                    calificación</button></a></th>
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
        <tbody>
          <?php
          $sentencia = "SELECT * FROM calificaciones 
                                  INNER JOIN usuarios ON calificaciones.estudiante = usuarios.idusuarios 
                                  INNER JOIN materia ON calificaciones.materia = materia.idmateria";
          $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));

          while ($fila = $resultado->fetch_assoc()) {
            $idusuario = $_SESSION['idUsuario'];
            $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 2 AND usuarios_idusuarios = $idusuario AND modulo = 3";
            $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
            $filaP = $resultadoP->fetch_assoc();
            $permisoVer = $filaP['permi'];

            if ($permisoVer > 0) {
              ?>
              <tr>
                <td>
                  <?php echo $fila['idcalificacion']; ?>
                </td>
                <td>
                  <?php echo $fila['nombreusuario']; ?>
                </td>
                <td>
                  <?php echo $fila['nombremateria']; ?>
                </td>
                <td>
                  <?php echo $fila['nota']; ?>
                </td>
                <?php
            }

            $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 4 AND usuarios_idusuarios = $idusuario AND modulo = 3";
            $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
            $filaP = $resultadoP->fetch_assoc();
            $permisoEliminar = $filaP['permi'];

            if ($permisoEliminar > 0) {
              ?>
                <td><a href='../Models/eliminarcalificacion.php?id=<?php echo $fila['idcalificacion']; ?>'
                    onclick='return confirm("¿Estás seguro de que deseas eliminar esta calificación?");'><button
                      type='button' class='btn btn-danger'>Eliminar</button></a></td>
                <?php
            }

            $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 3 AND usuarios_idusuarios = $idusuario AND modulo = 3";
            $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
            $filaP = $resultadoP->fetch_assoc();
            $permisoActualizar = $filaP['permi'];

            if ($permisoActualizar > 0) {
              ?>
                <td><a href='modificarcalificacion.php?id=<?php echo $fila['idcalificacion']; ?>'><button
                      class='btn btn-success'>Modificar</button></a></td>
                <?php
            }

            echo "</tr>";
          }
          ?>
            <?php
            $idusuario = $_SESSION['idUsuario'];
            $consultaPermisos = "SELECT count(*) as permi FROM permisoespecifico WHERE fk_permisos = 2 AND usuarios_idusuarios = $idusuario AND modulo = 3";
            $resultadoP = $conexion->query($consultaPermisos) or die(mysqli_error($conexion));
            $filaP = $resultadoP->fetch_assoc();
            $permisoVer = $filaP['permi'];

            if ($permisoVer > 0) {
              ?>
              <br><a href="generar_pdf_calificaciones.php" class="btn btn-primary" target="_blank">
                <i class="fas fa-file-pdf"></i> Generar PDF de Notas
              </a>
              <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>