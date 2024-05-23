<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Evento/responsable</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Eventos/responsables</h1> </span>
  		<br>
	  <form action="nuevo_evento_responsable2.php" method="POST" >
      <label>Nombre Evento: </label>
  		<select class="form-control" name="nombre_evento">
        <?php 
         $sentencia="SELECT * FROM eventos";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idEventos']."'>".$fila['Nombre_evento']."</option>";
         }
        ?>
      </select>
      <br>
      <label>Nombre Responsable: </label>
      <select class="form-control" name="nombre_responsable">
        <?php 
         $sentencia="SELECT * FROM responsables";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idResponsables']."'>".$fila['Nombre_responsable']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>