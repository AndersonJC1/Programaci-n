<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ocupación</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

  		<span> <h1>Ocupación</h1> </span>
  		<br>
	  <form action="nuevo_ocupacion2.php" method="POST" >
  		
  		<label>Ocupación del empleado: </label>
  		<input class="form-control" type="text" id="nombre_ocupacion" name="nombre_ocupacion" ><br>
  	
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  
</div>


</body>
</html>