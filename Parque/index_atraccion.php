<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atracciones</title>
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
  			<th>Código</th>
        <th>Nombre de atracción</th>
        <th>Año</th>
        <th>Marca</th>
        <th> <a href="nuevo_atraccion.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_marca.php"> <button type="button" class="btn btn-danger">Marca</button> </a> </th>
        <th> <a href="index.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT atracciones.idatracciones, atracciones.codigo, atracciones.nombre_atraccion, atracciones.anio, marca.nombre_marca  from atracciones inner join marca on atracciones.marca_idmarca=marca.idmarca";
        
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idatracciones']; echo "</td>";
            echo "<td>"; echo $fila['codigo']; echo "</td>";
            echo "<td>"; echo $fila['nombre_atraccion']; echo "</td>";
            echo "<td>"; echo $fila['anio']; echo "</td>";
            echo "<td>"; echo $fila['nombre_marca']; echo "</td>";
            echo "<td><a href='modif_atraccion.php?id=".$fila['idatracciones']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_atraccion.php?id=".$fila['idatracciones']."'> <button type='button' class='btn btn-danger'>Eliminar atracción</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>