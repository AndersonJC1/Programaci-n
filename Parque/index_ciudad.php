<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ciudad</title>
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
				<th>Ciudad</th>
				<th> <a href="nuevo_ciudad.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
				<th> <a href="index_empleado.php"> <button type="button" class="btn btn-info">Volver a empleados</button> </a> </th>
			<?php
				include "conexion.php";
				$sentecia="SELECT * FROM ciudad";
				$resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
				while($fila=$resultado->fetch_assoc())
				{
					echo "<tr>";
						echo "<td>"; echo $fila['idciudad']; echo "</td>";
						echo "<td>"; echo $fila['nombre_ciudad'];
						echo "<td><a href='modif_ciudad.php?id=".$fila['idciudad']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
						echo " <td><a href='eliminar_ciudad.php?id=".$fila['idciudad']."'> <button type='button' class='btn btn-danger'>Eliminar ciudad</button> </a></td>";
					echo "</tr>";
				}
			?>
		</table>
</div>
</body>
</html>