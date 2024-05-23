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
  		<span> <h1>Tipo de documento</h1> </span>
  		<br>
	  <form action="nuevo_tipo_documento2.php" method="POST" >

      <label>Tipo de documento: </label>
      <input class="form-control" type="text" id="nombre_tipo_documento" name="nombre_tipo_documento" ><br>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>

</body>
</html>