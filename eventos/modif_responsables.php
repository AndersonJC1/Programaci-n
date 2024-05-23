<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM responsables WHERE idResponsables =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc(); 
  $nombre_res=$fila['Nombre_responsable'];
  $doc_res=$fila['Numero_identificacion'];
  $res_res=$fila['Responsabilidad'];
  $grupo=$fila['Grupos_responsables_idGrupos'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar responsable</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Grupos</h1> </span>
      <br>
    <form action="modif_responsables2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">

      <label>Nombre del responsable: </label>
      <input class="form-control" type="text" id="nombre_res" name="nombre_res" value="<?php echo $nombre_res?>"><br>
      
      <label>Número de identificación del responsable: </label>
      <input class="form-control" type="text" id="doc_res" name="doc_res" value="<?php echo $doc_res?>"><br>

      <label>Responsabilidad: </label><br>
      <textarea name="responsabilidad" rows="10" cols="150"><?php echo $res_res?></textarea><br>

      <label>Grupo: </label>
      <select class="form-control" name="grupo">
        <?php 
         $sentencia="SELECT * FROM grupos_responsables";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          $selected = "";
        if ($grupo== $fila['idGrupos']) {
         $selected = "SELECTED";
        }
          echo "<option value='".$fila['idGrupos']."' $selected>".$fila['Nombre_grupo']."</option>";
         }
        ?>
      </select>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>