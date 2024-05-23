<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM tipo_participante WHERE idtipo_participante =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar ciudad".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc();
  $nombre=$fila['Nombre_tipo_participante'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Tipo Participante</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Tipos Participante</h1> </span>
      <br>
    <form action="modif_tipo_participante2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Tipo de participante: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>