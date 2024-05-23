<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eventos-participantes</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <table class="table table-bordered">
      <thead >
        <th>Nombre del evento</th>
        <th>Participante</th>
        <th> <a href="nuevo_evento_participante.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_evento.php"> <button type="button" class="btn btn-info">Volver a eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
      </thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT eventos.idEventos, eventos.Nombre_evento, participantes.idParticipantes,participantes.Nombre_participante from eventos_has_participantes inner join eventos on eventos_has_participantes.Eventos_idEventos=eventos.idEventos inner join participantes on eventos_has_participantes.Participantes_idParticipantes=participantes.idParticipantes"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['Nombre_evento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_participante']; echo "</td>";
            echo "<td><a href='modif_eventos_participantes.php?id=".$fila['idEventos']."&ida=".$fila['idParticipantes']."> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_eventos_conferencistas.php?id=".$fila['idEventos']."&ida=".$fila['idParticipantes']."> <button type='button' class='btn btn-danger'>Eliminar evento-participante</button> </a></td>";
          echo "</tr>";
        }
      ?>
    </table>
</div>
</body>
</html>