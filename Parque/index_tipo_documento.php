<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tipo de documento</title>
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
				<th>Tipo de documento</th>
				<th> <a href="nuevo_tipo_documento.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
				  <th> <a href="index_empleado.php"> <button type="button" class="btn btn-danger">Volver a empleados</button> </a> </th>
			<?php
				include "conexion.php";
				$sentecia="SELECT * FROM tipo_documento";
				$resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
				while($fila=$resultado->fetch_assoc())
				{
					echo "<tr>";
						echo "<td>"; echo $fila['idtipo_documento']; echo "</td>";
						echo "<td>"; echo $fila['nombre_tipo_documento'];
						echo "<td><a href='modif_tipo_doc.php?id=".$fila['idtipo_documento']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
						echo " <td><a href='eliminar_tipo_documento.php?id=".$fila['idtipo_documento']."'> <button type='button' class='btn btn-danger'>Eliminar tipo de documento</button> </a></td>";
					echo "</tr>";
				}
			?>
		</table>
</div>
</body>
</html>