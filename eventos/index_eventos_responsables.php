<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eventos-responsables</title>
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
        <th>Responsable</th>
        <th> <a href="nuevo_evento_responsable.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_evento.php"> <button type="button" class="btn btn-info">Volver a eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
      </thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT eventos.idEventos, eventos.Nombre_evento, responsables.idResponsables,responsables.Nombre_responsable from eventos_has_responsables inner join eventos on eventos_has_responsables.Eventos_idEventos=eventos.idEventos inner join responsables on eventos_has_responsables.Responsables_idResponsables=responsables.idResponsables"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['Nombre_evento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_responsable']; echo "</td>";
            echo "<td><a href='modif_eventos_responsables.php?id=".$fila['idEventos']."&ida=".$fila['idResponsables']."> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_eventos_responsables.php?id=".$fila['idEventos']."&ida=".$fila['idResponsables']."> <button type='button' class='btn btn-danger'>Eliminar evento-responsable</button> </a></td>";
          echo "</tr>";
        }
      ?>
    </table>
</div>
</body>
</html>