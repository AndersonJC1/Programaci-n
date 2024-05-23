<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grupos responsables</title>
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
  			<th>Nombre del grupo</th>
  			<th>Dependencia</th>
  			<th> <a href="nuevo_grupo.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_responsables.php"><button type="button" class="btn btn-danger">Ir a Responsables</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT grupos_responsables.idGrupos,grupos_responsables.Nombre_grupo,Dependencias.Nombre_dependencia from grupos_responsables inner join Dependencias on grupos_responsables.Dependencias_idDependencias=Dependencias.idDependencias"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idGrupos']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_grupo']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_dependencia']; echo "</td>";
            echo "<td><a href='modif_grupo.php?id=".$fila['idGrupos']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_grupo.php?id=".$fila['idGrupos']."'> <button type='button' class='btn btn-danger'>Eliminar grupo</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>
