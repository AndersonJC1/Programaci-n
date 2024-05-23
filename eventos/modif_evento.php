<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM eventos WHERE idEventos =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al actualizar".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc(); 
  $codigo=$fila['Codigo_evento'];
  $nombre=$fila['Nombre_evento'];
  $dependencia=$fila['Dependencias_idDependencias'];
  $fecha_r=$fila['Fecha_realizacion'];
  $espfisico=$fila['Espacios_fisicos'];
  $hora_i=$fila['Hora_inicio'];
  $hora_f=$fila['Hora_fin'];
  $imp_tecnico=$fila['Implemento_tecnico'];
  $tipo_evento=$fila['Tipo_evento_idTipo_evento'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Evento</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Eventos</h1> </span>
      <br>
    <form action="modif_evento2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Código del evento: </label>
      <input class="form-control" type="text" id="codigo" name="codigo" value="<?php echo $codigo?>"><br>
      
      <label>Nombre del evento: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>

      <label>Dependencia: </label>
      <select class="form-control" name="dependencia">
        <?php 
         $sentencia="SELECT * FROM dependencias";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
        $selected = "";
        if ($dependencia== $fila['idDependencias']) {
         $selected = "SELECTED";
       }
          echo "<option value='".$fila['idDependencias']."' $selected>".$fila['Nombre_dependencia']."</option>";
         }
        ?>
      </select><br>

      <label>Fecha de realización: </label>
      <input class="form-control" type="date" id="fecha_r" name="fecha_r" value="<?php echo $fecha_r?>"><br>
      
      <label>Espacio físico: </label>
      <input class="form-control" type="text" id="estacio_fisico" name="espacio_fisico"value="<?php echo $espfisico?>"><br>

      <label>Hora de inicio: </label>
      <input class="form-control" type="time" id="hora_inicio" name="hora_inicio" value="<?php echo $hora_i?>"><br>
      
      <label>Hora de finalización: </label>
      <input class="form-control" type="time" id="hora_fin" name="hora_fin" value="<?php echo $hora_f?>"><br>

      <label>Implemento técnico: </label>
      <input class="form-control" type="text" id="implemento_tecnico" name="implemento_tecnico" value="<?php echo $imp_tecnico?>"><br>

      <label>Tipo de evento: </label>
      <select class="form-control" name="tipo_evento">
        <?php 
         $sentencia="SELECT * FROM tipo_evento";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          $selected = "";
        if ($tipo_evento== $fila['idTipo_evento']) {
         $selected = "SELECTED";
          }
          echo "<option value='".$fila['idTipo_evento']."' $selected>".$fila['Nombre_tipo_evento']."</option>";
         }
        ?>
      </select><br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>