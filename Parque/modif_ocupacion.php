<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM ocupacion WHERE idocupacion=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al consultar atraccion".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc(); 
    $nombre_ocupacion = $fila['nombre_ocupacion'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar ocupacion</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Modificar ocupación</h1> </span>
  		<br>
	  <form action="modif_ocupacion2.php" method="POST">
       <input class="form-control" type="hidden" name="idocupacion"  value="<?php echo $_REQUEST['id']?>"> 

  		<label>Nombre de la ocupación: </label>
  		<input class="form-control" type="text" id="nombre_ocupacion" name="nombre_ocupacion" value="<?php echo $nombre_ocupacion ?>"><br> 	
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>