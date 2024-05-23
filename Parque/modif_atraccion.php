<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM atracciones WHERE idatracciones=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al actualizar atraccion".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc(); 
    $codigo = $fila['codigo'];
    $nombre_atraccion = $fila['nombre_atraccion'];
    $anio = $fila['anio']; 
    $marcas=$fila['marca_idmarca'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar atracción</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Modificar atracción</h1> </span>
  		<br>
	   <form action="modif_atraccion2.php" method="POST">
       <input class="form-control" type="hidden" name="idatracciones"  value="<?php echo $_REQUEST['id']?>"> 

  		<label>Codigo atracción: </label>
  		<input class="form-control" type="text" id="codigo" name="codigo" value="<?php echo $codigo ?>" ><br> 

  		<label>Nombre de la atracción: </label>
  		<input class="form-control" type="text" id="nombre_atraccion" name="nombre_atraccion" value="<?php echo $nombre_atraccion ?>"><br> 	

  		<label>Año: </label>
      <input class="form-control" type="text" id="anio" name="anio" value="<?php echo $anio ?>"><br>

       <label>Marca: </label>
      <select class="form-control" name="marcas">
        <?php 
         $sentencia="SELECT * FROM marca";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idmarca']."'>".$fila['nombre_marca']."</option>";
         }
        ?>
      </select>
      <br>
  		<button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>