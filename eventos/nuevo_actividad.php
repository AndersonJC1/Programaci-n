<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear actividad</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Actividades</h1> </span>
  		<br>
	  <form action="nuevo_actividad2.php" method="POST" >
  
  		<label>Nombre de la actividad: </label>
  		<input class="form-control" type="text" id="nombre" name="nombre" ><br>

      <label>Hora de inicio: </label>
      <input class="form-control" type="time" id="hora_inicio" name="hora_inicio"><br>
      
      <label>Hora de finalización: </label>
      <input class="form-control" type="time" id="hora_fin" name="hora_fin"><br>

      <label>Lugar: </label>
      <input class="form-control" type="text" id="lugar" name="lugar"><br>

      <label>Fecha: </label>
      <input class="form-control" type="date" id="Fecha" name="Fecha"><br>

      <label>Evento: </label>
  		<select class="form-control" name="evento">
        <?php 
         $sentencia="SELECT * FROM eventos";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idEventos']."'>".$fila['Nombre_evento']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>