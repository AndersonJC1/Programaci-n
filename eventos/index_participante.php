<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Participantes</title>
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
  			<th>Nombre de participante</th>
  			<th>Número de identificación</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Tipo de participante</th>
  			<th> <a href="nuevo_participante.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_tipo_participante.php"> <button type="button" class="btn btn-danger">Tipo de participante</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT participantes.idParticipantes,participantes.Nombre_participante,participantes.Numero_identificacion,participantes.Telefono,participantes.Direccion,tipo_participante.Nombre_tipo_participante from participantes inner join tipo_participante on participantes.Tipo_participante_idtipo_participante=tipo_participante.idtipo_participante";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idParticipantes']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_participante']; echo "</td>";
            echo "<td>"; echo $fila['Numero_identificacion']; echo "</td>";
            echo "<td>"; echo $fila['Telefono']; echo "</td>";
            echo "<td>"; echo $fila['Direccion']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_tipo_participante']; echo "</td>";
            echo "<td><a href='modif_participante.php?id=".$fila['idParticipantes']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_participante.php?id=".$fila['idParticipantes']."'> <button type='button' class='btn btn-danger'>Eliminar participante</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>