<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear evento</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Eventos</h1> </span>
  		<br>
	  <form action="nuevo_evento2.php" method="POST" >
  		<label>Código del evento: </label>
  		<input class="form-control" type="text" id="codigo" name="codigo"><br>
  		
  		<label>Nombre del evento: </label>
  		<input class="form-control" type="text" id="nombre" name="nombre" ><br>

      <label>Dependencia: </label>
      <select class="form-control" name="dependencia">
        <?php 
         $sentencia="SELECT * FROM Dependencias";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idDependencias']."'>".$fila['Nombre_dependencia']."</option>";
         }
        ?>
      </select>
      <br>

  		<label>Fecha de realización: </label>
  		<input class="form-control" type="date" id="fecha_r" name="fecha_r"><br>
  		
      <label>Espacio físico: </label>
      <input class="form-control" type="text" id="estacio_fisico" name="espacio_fisico"><br>

      <label>Hora de inicio: </label>
      <input class="form-control" type="time" id="hora_inicio" name="hora_inicio"><br>
      
      <label>Hora de finalización: </label>
      <input class="form-control" type="time" id="hora_fin" name="hora_fin"><br>

      <label>Implemento técnico: </label>
      <input class="form-control" type="text" id="implemento_tecnico" name="implemento_tecnico"><br>

      <label>Tipo de evento: </label>
  		<select class="form-control" name="tipo_evento">
        <?php 
         $sentencia="SELECT * FROM tipo_evento";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idTipo_evento']."'>".$fila['Nombre_tipo_evento']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>