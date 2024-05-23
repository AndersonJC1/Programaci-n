<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atraccion</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

  		<span> <h1>Atracciones</h1> </span>
  		<br>
	  <form action="nuevo_atraccion2.php" method="POST" >

      <label>Código: </label>
      <input class="form-control" type="text" id="codigo" name="codigo"><br>

      <label>Nombre de atracción: </label>
  		<input class="form-control" type="text" id="nombre_atraccion" name="nombre_atraccion" ><br>
  		
      <label>Año: </label>
      <input class="form-control" type="text" id="anio" name="anio"><br>

      <label>Marca: </label>
  		<select class="form-control" name="marcas">
        <?php 
         $sentencia="SELECT * FROM marca";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idmarca']."'>".$fila['nombre_marca']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>

</body>
</html>