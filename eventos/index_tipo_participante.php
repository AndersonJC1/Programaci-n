<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tipo de participante</title>
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
  			<th>Tipo de participante</th>
  			<th> <a href="nuevo_tipo_participante.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
        <th> <a href="index_participante.php"> <button type="button" class="btn btn-info">Ir a participantes</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT * FROM tipo_participante";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idtipo_participante']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_tipo_participante'];
            echo "<td><a href='modif_tipo_participante.php?id=".$fila['idtipo_participante']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_tipo_participante.php?id=".$fila['idtipo_participante']."'> <button type='button' class='btn btn-danger'>Eliminar tipo de participante</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>