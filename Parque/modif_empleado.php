<?php 
  $id = $_REQUEST['id']; 
   include 'conexion.php';
   $sentencia="SELECT * FROM empleados WHERE idempleados=$id ";
   $resultado= $conexion->query($sentencia) or die ("Error al actualizar empleado".mysqli_error($conexion));
    $fila=$resultado->fetch_assoc(); 
    $nombre = $fila['nombre'];
    $documento = $fila['documento']; 
    $direccion=$fila['direccion'];
    $telefono=$fila['telefono'];
    $tipos=$fila['tipo_documento_idtipo_documento'];
    $ocupaciones=$fila['ocupacion_idocupacion'];
    $ciudades=$fila['ciudad_idciudad'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar empleado</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
      <span> <h1>Modificar empleado</h1> </span>
      <br>
    <form action="modif_empleado2.php" method="POST">
       <input class="form-control" type="hidden" name="idempleados"  value="<?php echo $_REQUEST['id']?>"> 

      <label>Nombre del empleado: </label>
      <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>"><br>  

      <label>Documento: </label>
      <input class="form-control" type="text" id="documento" name="documento" value="<?php echo $documento ?>"><br>

      <label>Dirección: </label>
      <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $direccion ?>"><br>

      <label>Telefono: </label>
      <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $telefono ?>"><br>

       <label>Tipo de documento: </label>
      <select class="form-control" name="tipos">
        <?php 
         $sentencia="SELECT * FROM tipo_documento";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idtipo_documento']."'>".$fila['nombre_tipo_documento']."</option>";
         }
        ?>
      </select>
       <label>Ocupación: </label>
      <select class="form-control" name="ocupaciones">
        <?php 
         $sentencia="SELECT * FROM ocupacion";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idocupacion']."'>".$fila['nombre_ocupacion']."</option>";
         }
        ?>
      </select>
       <label>Ciudad: </label>
      <select class="form-control" name="ciudades">
        <?php 
         $sentencia="SELECT * FROM ciudad";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idciudad']."'>".$fila['nombre_ciudad']."</option>";
         }
        ?>
      </select>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>