<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM actividades WHERE idActividades=$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar ciudad".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc(); 
  $nombre = $fila['Nombre_actividad'];
  $hora_i = $fila['Hora_inicio'];
  $hora_f = $fila['Hora_fin'];
  $lugar = $fila['Lugar'];
  $Fecha = $fila['Fecha'];
  $evento = $fila['Eventos_idEventos'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Actividad</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Actividades</h1> </span>
      <br>
    <form action="modif_actividad2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Nombre de la actividad: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>

      <label>Hora de inicio: </label>
      <input class="form-control" type="time" id="hora_inicio" name="hora_inicio"value="<?php echo $hora_i?>"><br>
      
      <label>Hora de finalización: </label>
      <input class="form-control" type="time" id="hora_fin" name="hora_fin"value="<?php echo $hora_f?>"><br>

      <label>Lugar: </label>
      <input class="form-control" type="text" id="lugar" name="lugar"value="<?php echo $lugar?>"><br>

      <label>Fecha: </label>
      <input class="form-control" type="date" id="Fecha" name="Fecha"value="<?php echo $Fecha?>"><br>

      <label>Evento: </label>
      <select class="form-control" name="evento">
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
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>