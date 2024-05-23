<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM clientes WHERE idclientes=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al actualizar cliente".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc(); 
    $nombre = $fila['nombre'];
    $direccion = $fila['direccion']; 
    $telefono=$fila['telefono'];
    $documento=$fila['documento'];
    $tipo_doc=$fila['tipo_documento_idtipo_documento'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar cliente</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Modificar cliente</h1> </span>
  		<br>
	  <form action="modif_cliente2.php" method="POST">
       <input class="form-control" type="hidden" name="idclientes"  value="<?php echo $_REQUEST['id']?>"> 

  		<label>Nombre del cliente: </label>
  		<input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>"><br> 	

      <label>Documento: </label>
      <input class="form-control" type="number" id="documento" name="documento" value="<?php echo $documento ?>"><br>

  		<label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $direccion ?>"><br>

       <label>Telefono: </label>
      <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $telefono ?>"><br>

       <label>Tipo de documento: </label>
      <select class="form-control" name="tipo_doc">
        <?php 
         $sentencia="SELECT * FROM tipo_documento";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idtipo_documento']."'>".$fila['nombre_tipo_documento']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>