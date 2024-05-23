<?php
include 'conexion.php';
	$nombre=$_POST['nombre'];
	$dependencia=$_POST['dependencia'];

		$sentencia= "INSERT INTO grupos_responsables (Nombre_grupo,Dependencias_idDependencias) VALUES ('$nombre',$dependencia)";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Grupo Ingresado Exitosamante!!");
	window.location.href='index_grupo.php';
</script>