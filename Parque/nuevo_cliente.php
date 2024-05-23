<?php
  include "conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cliente</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Cliente</h1> </span>
  		<br>
	  <form action="nuevo_cliente2.php" method="POST" >
  		
  		<label>Documento: </label>
  		<input class="form-control" type="number" id="documento" name="documento" ><br>

  		<label>Nombre: </label>
  		<input class="form-control" type="text" id="nombre" name="nombre"><br>
  		
      <label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion"><br>

      <label>Teléfono: </label>
      <input class="form-control" type="text" id="telefono" name="telefono"><br>

     <label>Tipo de documento: </label>
      <select class="form-control" name="tipos">
        <?php 
         $sentencia="SELECT * FROM tipo_documento";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idtipo_documento']."'>".$fila['nombre_tipo_documento']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>

</body>
</html>