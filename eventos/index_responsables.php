<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsables</title>
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
        <th>Nombre del Responsable</th>
        <th>Número de identificación del Responsable</th>
        <th>Responsabilidad</th>
        <th>Nombre del grupo</th>
  			<th> <a href="nuevo_responsables.php"> <button type="button" class="btn btn-success">Nuevo</button> </a> </th>
        <th> <a href="index_grupo.php"> <button type="button" class="btn btn-danger">Ir a Grupos</button> </a> </th>
        <th> <a href="menu.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT responsables.idResponsables,responsables.Nombre_responsable,responsables.Numero_identificacion,responsables.Responsabilidad, grupos_responsables.Nombre_grupo from responsables inner join grupos_responsables on responsables.Grupos_responsables_idGrupos=grupos_responsables.idGrupos"; 
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idResponsables']; echo "</td>";
            echo "<td>"; echo $fila['Nombre_responsable']; echo "</td>";
            echo "<td>"; echo $fila['Numero_identificacion']; echo "</td>";
              echo "<td>"; echo $fila['Responsabilidad']; echo "</td>";
                echo "<td>"; echo $fila['Nombre_grupo']; echo "</td>";
            echo "<td><a href='modif_responsables.php?id=".$fila['idResponsables']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_responsables.php?id=".$fila['idResponsables']."'> <button type='button' class='btn btn-danger'>Eliminar responsable</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>
