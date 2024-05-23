<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dependencias</title>
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
  			<th>Nombre Dependencia</th>
  			<th> <a href="nuevo_dependencia.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_grupo.php"><button type="button" class="btn btn-danger">Ir a Grupo Responsables</button> </a> </th>
        <th> <a href="index_evento.php"><button type="button" class="btn btn-danger">Ir a Eventos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT dependencias.idDependencias,dependencias.Nombre_dependencia from dependencias"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idDependencias']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_dependencia']; echo "</td>";
            echo "<td><a href='modif_dependencia.php?id=".$fila['idDependencias']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_dependencia.php?id=".$fila['idDependencias']."'> <button type='button' class='btn btn-danger'>Eliminar dependencia</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>
