<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
</head>
<body>
</html><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="estilo.css" media="">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="java.js"></script>
<div class="container">
  <div class="row">
    <h2><font face="Cambria">Sistema de administración de eventos en Cotecnova</h2></font>
  </div>
</div>
<nav>
<div class="container">
   
    <table class="table table-bordered">
      <thead >
      <th>No.</th>
      <th>Usuario</th>
      <th>Contraseña</th>
        <th> <a href="nuevo_usuario.php"> <button type="button" class="btn btn-info">Nuevo usuario</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Menú</button> </a> </th>
      </thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT * FROM usuarios";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idusuarios']; echo "</td>";
            echo "<td>"; echo $fila['usuario']; echo "</td>";
            echo "<td>"; echo $fila['contrasena']; echo "</td>";
            echo "<td><a href='modif_usuario.php?id=".$fila['idusuarios']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_usuario.php?id=".$fila['idusuarios']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>
   </table>
</div>
</body>
</hhtml>