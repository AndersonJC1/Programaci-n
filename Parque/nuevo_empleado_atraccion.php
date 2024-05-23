<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Empleado-Atraccion</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
  		<span> <h1>Empleado-Atraccion</h1> </span>
  		<br>
	  <form action="nuevo_empleado_atraccion2.php" method="POST" >
      <label>Empleado: </label>
  		<select class="form-control" name="empleados">
        <?php 
        include 'conexion.php';
         $sentencia="SELECT * FROM empleados";
         $resultado= $conexion->query($sentencia) or die (mysqli_error($conexion));
         while ($fila=$resultado->fetch_assoc()){
          echo "<option value='".$fila['idempleados']."'>".$fila['nombre']."</option>";
         }
        ?>
      </select>
      <label>Atraccion: </label>
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