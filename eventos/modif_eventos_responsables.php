<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM eventos_has_responsables WHERE Eventos_idEventos =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar ciudad".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc();
  $evento=$fila['Eventos_idEventos'];
  $res=$fila['Responsables_idResponsables'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar eventos/responsable</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Eventos/Responsable</h1> </span>
      <br>
    <form action="modif_eventos_responsables2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Nombre Evento: </label>
      <select class="form-control" name="nombre_evento">
        <?php 
         $sentencia="SELECT * FROM eventos";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          $selected = "";
        if ($evento== $fila['idEventos']) {
         $selected = "SELECTED";
        }
          echo "<option value='".$fila['idEventos']."' $selected>".$fila['Nombre_evento']."</option>";
         }
        ?>
      </select>
      <br>
      <label>Nombre Responsable: </label>
      <select class="form-control" name="nombre_responsable">
        <?php 
         $sentencia="SELECT * FROM responsables";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          $selected = "";
        if ($res== $fila['idResponsables']) {
         $selected = "SELECTED";
        }
          echo "<option value='".$fila['idResponsables']."' $selected>".$fila['Nombre_responsable']."</option>";
         }
        ?>
      </select>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>