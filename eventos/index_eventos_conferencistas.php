<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eventos-conferencistas</title>
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
        <th>Conferencista</th>
        <th>Abstract de la conferencia</th>
        <th>Contenido de ponencia</th>
        <th><a href="nuevo_evento_conferencista.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_evento.php"> <button type="button" class="btn btn-info">Volver a eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
      </thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT eventos.idEventos, eventos.Nombre_evento, conferencistas.idConferencistas,conferencistas.Nombre_conferencista, conferencistas.Abstract_conferencia, conferencistas.Contenido_ponencia from eventos_has_conferencistas inner join eventos on eventos_has_conferencistas.Eventos_idEventos=eventos.idEventos inner join conferencistas on eventos_has_conferencistas.Conferencistas_idConferencistas=conferencistas.idConferencistas";  
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['Nombre_evento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_conferencista']; echo "</td>";
            echo "<td >"; echo $fila['Abstract_conferencia']; echo "</td>";
            echo "<td>"; echo $fila['Contenido_ponencia']; echo "</td>";
            echo "<td><a href='modif_eventos_conferencistas.php?id=".$fila['idEventos']."&ida=".$fila['idConferencistas']."> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_eventos_conferencistas.php?id=".$fila['idEventos']."&ida=".$fila['idConferencistas']."> <button type='button' class='btn btn-danger'>Eliminar evento-conferencista</button> </a></td>";
          echo "</tr>";
        }
      ?>
    </table>
</div>
</body>
</html>