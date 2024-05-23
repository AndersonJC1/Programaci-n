<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM grupos_responsables WHERE idGrupos =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar ciudad".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc(); 
  $nombre=$fila['Nombre_grupo'];
  $dependencia=$fila['Dependencias_idDependencias'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Grupo</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Grupos</h1> </span>
      <br>
    <form action="modif_grupo2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Nombre del grupo: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>

      <label>Dependencia: </label>
      <select class="form-control" name="dependencia">
        <?php 
         $sentencia="SELECT * FROM Dependencias";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
        $selected = "";
        if ($dependencia== $fila['idDependencias']) {
         $selected = "SELECTED";
          }
          echo "<option value='".$fila['idDependencias']."' $selected>".$fila['Nombre_dependencia']."</option>";
         }
        ?>
      </select>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>