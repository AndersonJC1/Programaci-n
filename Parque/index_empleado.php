<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Empleados</title>
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
        <th>Nombre</th>
  			<th>Documento</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Tipo de documento</th>
        <th>Ocupación</th>
        <th>Ciudad</th>

        <th> <a href="nuevo_empleado.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>

  			<th> <a href="index_ciudad.php"> <button type="button" class="btn btn-danger">Ciudad</button> </a> </th>

        <th> <a href="index_tipo_documento.php"> <button type="button" class="btn btn-danger">Tipo de documento</button> </a> </th>

        <th> <a href="index_ocupacion.php"> <button type="button" class="btn btn-danger">ocupacion</button> </a> </th>
        
        <th> <a href="index.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        
        $sentecia="SELECT empleados.idempleados, empleados.nombre, empleados.documento, empleados.direccion, empleados.telefono, tipo_documento.nombre_tipo_documento, ocupacion.nombre_ocupacion, ciudad.nombre_ciudad from empleados inner join tipo_documento on empleados.tipo_documento_idtipo_documento=tipo_documento.idtipo_documento inner join ocupacion on empleados.ocupacion_idocupacion=ocupacion.idocupacion inner join ciudad on empleados.ciudad_idciudad=ciudad.idciudad";

        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idempleados']; echo "</td>";
            echo "<td>"; echo $fila['nombre']; echo "</td>";
            echo "<td>"; echo $fila['documento']; echo "</td>";
            echo "<td>"; echo $fila['direccion']; echo "</td>";
            echo "<td>"; echo $fila['telefono']; echo "</td>";
            echo "<td>"; echo $fila['nombre_tipo_documento']; echo "</td>";
            echo "<td>"; echo $fila['nombre_ocupacion']; echo "</td>";
             echo "<td>"; echo $fila['nombre_ciudad']; echo "</td>";
            echo "<td><a href='modif_empleado.php?id=".$fila['idempleados']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_empleado.php?id=".$fila['idempleados']."'> <button type='button' class='btn btn-danger'>Eliminar empleado</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>