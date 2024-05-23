<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cliente-atraccion</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  	<table class="table table-bordered">
  		<thead >
  			<th>Cliente</th>
        <th>Atracción</th>
        <th> <a href="nuevo_cliente_atraccion.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";

          $sentecia="SELECT clientes.idclientes, clientes.nombre, atracciones.idatracciones, atracciones.nombre_atraccion  from clientes_has_atracciones inner join clientes on clientes_has_atracciones.clientes_idclientes=clientes.idclientes inner join atracciones on clientes_has_atracciones.atracciones_idatracciones=atracciones.idatracciones";

        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['nombre']; echo "</td>";
            echo "<td>"; echo $fila['nombre_atraccion']; echo "</td>";
            echo "<td><a href='modif_cliente_atraccion.php?id=".$fila['idclientes']."&ida=".$fila['idatracciones']."> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";

            echo " <td><a href='eliminar_cliente_atraccion.php?id=".$fila['idclientes']."&ida=".$fila['idatracciones']."> <button type='button' class='btn btn-danger'>Eliminar cliente-atracción</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>