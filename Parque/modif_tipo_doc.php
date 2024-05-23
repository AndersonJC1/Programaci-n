<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM tipo_documento WHERE idtipo_documento=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al consultar producto".mysqli_error($conexion)); 
    $fila=$resultado->fetch_assoc(); 
    $nombre_tipo_documento = $fila['nombre_tipo_documento'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar tipo de documento</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Modificar Tipo de documento</h1> </span>
  		<br>
	  <form action="modif_tipo_doc2.php" method="POST">
      <input class="form-control" type="hidden" name="idtipo_documento"  value="<?php echo $_REQUEST['id']?>">	
  		<label>Tipo de documento: </label>
  		<input class="form-control" type="text" id="nombre_tipo_documento" name="nombre_tipo_documento" value="<?php echo $nombre_tipo_documento ?>"><br> 		
  		<button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>