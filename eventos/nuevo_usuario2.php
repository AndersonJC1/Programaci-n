<?php 
include('conexion.php');

$user = $_REQUEST['user'];
$pass = md5($_REQUEST['pass']);

$sentencia = "INSERT INTO usuarios VALUES(NULL,'$user','$pass')";
$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));

?>
<script type="text/javascript">
	alert("Usuario registrados Exitosamante!!");
	window.location.href='index.php';
</script>