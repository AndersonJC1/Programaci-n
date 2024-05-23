<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conferencistas</title>
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
  			<th>Nombre de conferencista</th>
  			<th>Número de identificación</th>
        <th>Teléfono</th>
        <th>Dirección</th>
  			<th> <a href="nuevo_conferencista.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_evento.php"> <button type="button" class="btn btn-danger">Ir a eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT conferencistas.idConferencistas,conferencistas.Nombre_conferencista,conferencistas.Numero_identificacion,conferencistas.Telefono,conferencistas.Direccion,conferencistas.Abstract_conferencia,conferencistas.Contenido_ponencia from conferencistas"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idConferencistas']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_conferencista']; echo "</td>";
            echo "<td>"; echo $fila['Numero_identificacion']; echo "</td>";
            echo "<td>"; echo $fila['Telefono']; echo "</td>";
            echo "<td>"; echo $fila['Direccion']; echo "</td>";
            echo "<td><a href='modif_conferencista.php?id=".$fila['idConferencistas']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_conferencista.php?id=".$fila['idConferencistas']."'> <button type='button' class='btn btn-danger'>Eliminar conferencista</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>
