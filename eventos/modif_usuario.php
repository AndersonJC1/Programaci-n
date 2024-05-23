<?php 
  $id = $_REQUEST['id']; 
  include 'conexion.php';
  $sentencia="SELECT * FROM usuarios WHERE idusuarios =$id ";
  $resultado= $conexion->query($sentencia) or die ("Error al consultar".mysqli_error($conexion)); 
  $fila=$resultado->fetch_assoc();
  $user = $fila['usuario'];
  $pass = $fila['contrasena'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Usuario</title>
  <style type="text/css">
    @import url("css/mycss.css");
  </style>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <span> <h1>Usuarios</h1> </span>
      <br>
    <form action="modif_usuario2.php" method="POST" >
      <input class="form-control" type="hidden" name="id"  value="<?php echo $_REQUEST['id']?>">
      <label>Usuario: </label>
      <input class="form-control" type="text" id="user" name="user" value="<?php echo $user?>"><br>
      <label>Nueva contraseña: </label>
      <input class="form-control" type="password" id="pass" name="pass" ><br>
      <br>
      <button type="submit" class="btn btn-success">Guardar</button>
     </form>
</div>
</body>
</html>