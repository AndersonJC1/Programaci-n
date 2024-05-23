<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
    $sentencia="SELECT * FROM clientes_has_atracciones WHERE clientes_idclientes=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al actualizar atraccion".mysqli_error($conexion)); 
   $fila=$resultado->fetch_assoc(); 
    $clientes = $fila['clientes_idclientes'];
    $atracciones=$fila['atracciones_idatracciones'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar cliente-atracción</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
      <span> <h1>Modificar cliente-atracción</h1> </span>
      <br>
    <form action="modif_cliente_atraccion2.php" method="POST">
        <input type="hidden" name="idclientes" value="<?php echo $clientes ?>">
      <input type="hidden" name="idatracciones" value="<?php echo $atracciones ?>">

      <label>Cliente: </label>
      <select class="form-control" name="clientes">
        <?php 
         $sentencia="SELECT * FROM clientes";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idclientes']."'>".$fila['nombre']."</option>";
         }
        ?>
      </select>
      <label>Atracción: </label>
      <select class="form-control" name="atracciones">
        <?php 
         $sentencia="SELECT * FROM atracciones";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idatracciones']."'>".$fila['nombre_atraccion']."</option>";
         }
        ?>
      </select>

      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>