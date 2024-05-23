<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM participantes WHERE idParticipantes =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar ciudad".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc();
  $codigo=$fila['idParticipantes'];
  $nombre=$fila['Nombre_participante'];
  $documento=$fila['Numero_identificacion'];
  $telefono=$fila['Telefono'];
  $direccion=$fila['Direccion'];
  $tipo_participante=$fila['Tipo_participante_idtipo_participante'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Participante</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Participantes</h1> </span>
      <br>
    <form action="modif_participante2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Nombre del participante: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>

      <label>Número de identificación: </label>
      <input class="form-control" type="text" id="documento" name="documento" value="<?php echo $documento?>"><br>

      <label>Teléfono: </label>
      <input class="form-control" type="text" id="telefono" name="telefono"value="<?php echo $telefono?>"><br>
      
      <label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $direccion?>"><br>
      
      <label>Tipo de participante: </label>
      <select class="form-control" name="tipo_participante">
        <?php 
         $sentencia="SELECT * FROM tipo_participante";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          $selected = "";
        if ($tipo_participante== $fila['idtipo_participante']) {
         $selected = "SELECTED";
        }
          echo "<option value='".$fila['idtipo_participante']."' $selected>".$fila['Nombre_tipo_participante']."</option>";
         }
        ?>
      </select>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>