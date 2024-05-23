<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM marca WHERE idmarca=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al actualizar marca".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc(); 
    $nombre_marca = $fila['nombre_marca'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar marca</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Modificar marca</h1> </span>
  		<br>
	  <form action="modif_marca2.php" method="POST">
      <input class="form-control" type="hidden" name="idmarca"  value="<?php echo $_REQUEST['id']?>">	
  		<label>Marca: </label>
  		<input class="form-control" type="text" id="nombre_marca" name="nombre_marca" value="<?php echo $nombre_marca ?>"><br> 		
  		<button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>