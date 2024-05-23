<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear grupo</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Grupos responsables</h1> </span>
  		<br>
	  <form action="nuevo_grupo2.php" method="POST" >
  		
  		<label>Nombre del grupo: </label>
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
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>