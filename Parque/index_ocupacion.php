<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ocupaciones</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  	<table class="table table-bordered">
  		<thead >
        <th>ID</th>
        <th>Nombre de ocupación</th>
        <th> <a href="nuevo_ocupacion.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_empleado.php"> <button type="button" class="btn btn-danger">Volver a empleados</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT * FROM ocupacion";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idocupacion']; echo "</td>";
            echo "<td>"; echo $fila['nombre_ocupacion']; echo "</td>";
            echo "<td><a href='modif_ocupacion.php?id=".$fila['idocupacion']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_ocupacion.php?id=".$fila['idocupacion']."'> <button type='button' class='btn btn-danger'>Eliminar ocupación</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>