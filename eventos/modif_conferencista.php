<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM conferencistas WHERE idConferencistas=$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar ciudad".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc(); 
  $nombre=$fila['Nombre_conferencista'];
  $documento=$fila['Numero_identificacion'];
  $tel=$fila['Telefono'];
  $dir=$fila['Direccion'];
  $abstract=$fila['Abstract_conferencia'];
  $contenido=$fila['Contenido_ponencia'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Conferentista</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Conferentistas</h1> </span>
      <br>
    <form action="modif_conferencista2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Nombre conferencista: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>

      <label>Número de identificación: </label>
      <input class="form-control" type="text" id="documento" name="documento" value="<?php echo $documento?>"><br>

      <label>Teléfono: </label>
      <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $tel?>"><br>
      
      <label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $dir?>"><br>

      <label>Abstract de conferencia: </label><br>
      <textarea name="abstract" rows="10" cols="150"><?php echo $abstract?></textarea><br>
      
      <label>Contenido de ponencia: </label><br>
      <textarea name="contenido" rows="10" cols="150"><?php echo $contenido?></textarea><br>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>