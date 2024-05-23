<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Actividades</title>
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
  			<th>Nombre de actividad</th>
  			<th>Hora de inicio</th>
        <th>Hora de finalización</th>
        <th>Lugar</th>
        <th>Fecha</th>
        <th>Evento</th>
  			<th> <a href="nuevo_actividad.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_evento.php"> <button type="button" class="btn btn-danger">Ir a eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT actividades.idActividades,actividades.Nombre_actividad,actividades.Hora_inicio,actividades.Hora_fin,actividades.Lugar,actividades.Fecha,eventos.Nombre_evento from actividades inner join eventos on actividades.Eventos_idEventos=eventos.idEventos"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idActividades']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_actividad']; echo "</td>";
            echo "<td>"; echo $fila['Hora_inicio']; echo "</td>";
            echo "<td>"; echo $fila['Hora_fin']; echo "</td>";
            echo "<td>"; echo $fila['Lugar']; echo "</td>";
            echo "<td>"; echo $fila['Fecha']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_evento']; echo "</td>";
            echo "<td><a href='modif_actividad.php?id=".$fila['idActividades']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_actividad.php?id=".$fila['idActividades']."'> <button type='button' class='btn btn-danger'>Eliminar actividad</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>
