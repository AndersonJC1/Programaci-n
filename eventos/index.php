<?php 
 include "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
     <div class="row">
      <div class="col-md-8 mx-auto">
      <div id="first">
        <div class="myform form ">
           <div class="logo mb-3">
             <div class="col-md-12 text-center">
		<h4><font face="Cambria">Sistema de administración de eventos en Cotecnova</h4></font>
<form method="post" action="">
  <div class="form-group"><br>
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" name="contra" id="contra">
  </div>
  <button type="submit" name="ingresar" class="btn btn-primary">Ingresar</button>
  <a href="nuevo_usuario.php"> <button type="button" class="btn btn-danger">Registrar</button> </a> </th>
</form>
</div>
</body>
</html>

<?php 
if (isset($_REQUEST['ingresar'])) {
	$user = $_REQUEST['usuario'];
	$pass = md5($_REQUEST['contra']);
	$sentecia="SELECT * FROM usuarios WHERE usuario = '$user' AND contrasena = '$pass' ";
    $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
    $valores = $resultado->fetch_array();

    if (isset($valores)) {
    	header("Location:menu.php");
    }else{
    	echo "usuario no existe";
    }
   
 }
?>