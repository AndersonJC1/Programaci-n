<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tipo de evento</title>
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
  			<th>Tipo de evento</th>
  			<th> <a href="nuevo_tipo_evento.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
        <th> <a href="index_evento.php"> <button type="button" class="btn btn-info">Ir a eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT * FROM tipo_evento";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idTipo_evento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_tipo_evento'];
            echo "<td><a href='modif_tipo_evento.php?id=".$fila['idTipo_evento']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_tipo_evento.php?id=".$fila['idTipo_evento']."'> <button type='button' class='btn btn-danger'>Eliminar tipo de evento</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>