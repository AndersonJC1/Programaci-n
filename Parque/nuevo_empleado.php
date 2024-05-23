<?php
  include "conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Empleados</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

  		<span> <h1>EMPLEADOS</h1> </span>
  		<br>
	  <form action="nuevo_empleado2.php" method="POST" >

  		<label>Nombre: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" ><br>

      <label>Documento: </label>
  		<input class="form-control" type="text" id="documento" name="documento" ><br>

  		<label>Direccion: </label>
  		<input class="form-control" type="text" id="direccion" name="direccion"><br>
  		
      <label>Telefono: </label>
      <input class="form-control" type="text" id="telefono" name="telefono"><br>

      <label>Tipo de documento: </label>
  		<select class="form-control" name="tipos">
        <?php 
         $sentencia="SELECT * FROM tipo_documento";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idtipo_documento']."'>".$fila['nombre_tipo_documento']."</option>";
         }
        ?>
      </select>
        <label>Ciudad: </label>
        <select class="form-control" name="ciudad">
        <?php 
         $sentencia="SELECT * FROM ciudad";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idciudad']."'>".$fila['nombre_ciudad']."</option>";
         }
         ?>
      </select>
        <label>Ocupacion</label>
        <select class="form-control" name="ocupacion">
        <?php 
         $sentencia="SELECT * FROM ocupacion";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idocupacion']."'>".$fila['nombre_ocupacion']."</option>";
         }
         ?>
       </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>

</body>
</html>