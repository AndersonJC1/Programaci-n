<?php
	
	$id = $_REQUEST['id'];
	$nombre=$_POST['nombre'];
	$dependencia=$_POST['dependencia'];

	include 'conexion.php';
	$sentencia="UPDATE grupos_responsables  SET Nombre_grupo='$nombre',Dependencias_idDependencias=$dependencia WHERE idGrupos=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_grupo.php';
</script>