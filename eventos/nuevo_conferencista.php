<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear conferencista</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span><h1>Conferencistas</h1> </span>
  		<br>
	  <form action="nuevo_conferencista2.php" method="POST" >
  		
  		<label>Nombre conferencista: </label>
  		<input class="form-control" type="text" id="nombre" name="nombre" ><br>

      <label>Número de identificación: </label>
      <input class="form-control" type="text" id="documento" name="documento" ><br>

  		<label>Teléfono: </label>
  		<input class="form-control" type="text" id="telefono" name="telefono"><br>
  		
      <label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion"><br>

      <label>Abstract de conferencia: </label><br>
      <textarea id="abstract" name="abstract" rows="10" cols="150" placeholder="Escribe aquí el abstract de la conferencia"></textarea><br>
      
      <label>Contenido de ponencia: </label><br>
      <textarea id="contenido" name="contenido" rows="10" cols="150" placeholder="Escribe aquí el contenido de ponencia"></textarea><br>

  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>