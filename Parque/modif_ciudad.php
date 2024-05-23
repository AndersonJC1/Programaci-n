<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM ciudad WHERE idciudad=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al actualizar ciudad".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc(); 
    $nombre_ciudad = $fila['nombre_ciudad'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar ciudad</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Modificar ciudad</h1> </span>
  		<br>
	  <form action="modif_ciudad2.php" method="POST">
       <input class="form-control" type="hidden" name="idciudad"  value="<?php echo $_REQUEST['id']?>"> 

  		<label>Nombre de la ciudad: </label>
  		<input class="form-control" type="text" id="nombre_ciudad" name="nombre_ciudad" value="<?php echo $nombre_ciudad ?>"><br> 	
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>