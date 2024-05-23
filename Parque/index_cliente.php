<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clientes</title>
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
        <th> <a href="nuevo_cliente.php"> <button type="button" class="btn btn-danger">Nuevo</button> </a> </th>
        <th> <a href="index_tipo_documento.php"> <button type="button" class="btn btn-danger">Tipo de documento</button> </a> </th>
        <th> <a href="index.php"> <button type="button" class="btn btn-info">Volver a inicio</button> </a> </th>
  		</thead>
      <?php
        include "conexion.php";
        $sentecia="SELECT clientes.idclientes, clientes.nombre, clientes.documento, clientes.direccion, clientes.telefono, tipo_documento.nombre_tipo_documento from clientes inner join tipo_documento on clientes.tipo_documento_idtipo_documento=tipo_documento.idtipo_documento";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['idclientes']; echo "</td>";
            echo "<td>"; echo $fila['nombre']; echo "</td>";
            echo "<td>"; echo $fila['documento']; echo "</td>";
            echo "<td>"; echo $fila['direccion']; echo "</td>";
            echo "<td>"; echo $fila['telefono']; echo "</td>";
            echo "<td>"; echo $fila['nombre_tipo_documento']; echo "</td>";
            echo "<td><a href='modif_cliente.php?id=".$fila['idclientes']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_cliente.php?id=".$fila['idclientes']."'> <button type='button' class='btn btn-danger'>Eliminar cliente</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
</div>
</body>
</html>