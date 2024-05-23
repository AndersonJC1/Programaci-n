<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eventos</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  <th> <a href="index_actividad.php"> <button type="button" class="btn btn-danger">Ir a actividades</button> </a> </th>
        <th><a href="index_eventos_responsables.php"> <button type="button" class="btn btn-danger">Eventos-responsables</button> </a> </th>
        <th><a href="index_eventos_conferencistas.php"> <button type="button" class="btn btn-danger">Eventos-conferencistas</button> </a> </th>
        <th><a href="index_eventos_participantes.php"> <button type="button" class="btn btn-danger">Eventos-participantes</button> </a> </th>
  	 <table class="table table-bordered">
  		<thead >
        <th>ID</th>
        <th>Código de evento</th>
  			<th>Nombre de evento</th>
  			<th>Dependencia</th>
        <th>Hora de inicio</th>
        <th>Hora de finalización</th>
        <th>Fecha de realización</th>
        <th>Espacio físico</th>
        <th>Implemento técnico</th>
        <th>Tipo de evento</th>
  			<th> <a href="nuevo_evento.php"> <button type="button" class="btn btn-success">Nuevo</button> </a> </th>
        <th> <a href="index_tipo_evento.php"> <button type="button" class="btn btn-danger">Tipo de evento</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT eventos.idEventos, eventos.Codigo_evento, eventos.Nombre_evento, dependencias.Nombre_dependencia, eventos.Hora_inicio, eventos.Hora_fin, eventos.Hora_fin, eventos.Fecha_realizacion,eventos.Espacios_fisicos, eventos.Implemento_tecnico,tipo_evento.Nombre_tipo_evento from eventos inner join tipo_evento on eventos.Tipo_evento_idTipo_evento=tipo_evento.idTipo_evento inner join dependencias on eventos.dependencias_idDependencias=dependencias.idDependencias"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idEventos']; echo "</td>";
            echo "<td>"; echo $fila['Codigo_evento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_evento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_dependencia']; echo "</td>";
             echo "<td>"; echo $fila['Hora_inicio']; echo "</td>";
            echo "<td>"; echo $fila['Hora_fin']; echo "</td>";
            echo "<td>"; echo $fila['Fecha_realizacion']; echo "</td>";
            echo "<td>"; echo $fila['Espacios_fisicos']; echo "</td>";
            echo "<td>"; echo $fila['Implemento_tecnico']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_tipo_evento']; echo "</td>";
            echo "<td><a href='modif_evento.php?id=".$fila['idEventos']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_evento.php?id=".$fila['idEventos']."'> <button type='button' class='btn btn-danger'>Eliminar evento</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>
