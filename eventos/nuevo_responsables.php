<?php
  include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear responsable</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Responsables</h1> </span>
  		<br>
	  <form action="nuevo_responsables2.php" method="POST" >
  		
  		<label>Nombre del responsable: </label>
  		<input class="form-control" type="text" id="nombre_responsable" name="nombre_responsable"><br>
  		
      <label>Número de identificación: </label>
      <input class="form-control" type="text" id="doc_responsable" name="doc_responsable"><br>

      <label>Responsabilidad: </label><br>
      <textarea id="responsabilidad" name="responsabilidad" rows="10" cols="150" placeholder="Escribe aquí la responsabilidad"></textarea><br>

     <label>Grupo: </label>
      <select class="form-control" name="grupo">
        <?php 
         $sentencia="SELECT * FROM grupos_responsables";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idGrupos']."'>".$fila['Nombre_grupo']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>