<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear participante</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span><h1>Participantes</h1> </span>
  		<br>
	  <form action="nuevo_participante2.php" method="POST" >
  		
  		<label>Nombre del participante: </label>
  		<input class="form-control" type="text" id="nombre" name="nombre" ><br>

      <label>Número de identificación: </label>
      <input class="form-control" type="text" id="documento" name="documento" ><br>

  		<label>Teléfono: </label>
  		<input class="form-control" type="text" id="telefono" name="telefono"><br>
  		
      <label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion"><br>
      
      <label>Tipo de participante: </label>
  		<select class="form-control" name="tipo_participante">
        <?php 
         $sentencia="SELECT * FROM tipo_participante";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idtipo_participante']."'>".$fila['Nombre_tipo_participante']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>