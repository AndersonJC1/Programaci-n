<?php
include 'conexion.php';
	$nombre_res=$_POST['nombre_responsable'];
	$doc_res=$_POST['doc_responsable'];
	$res_res=$_POST['responsabilidad'];
	$grupo=$_REQUEST['grupo'];

		$sentencia= "INSERT INTO responsables (Nombre_responsable,Numero_identificacion,Responsabilidad,Grupos_responsables_idGrupos) VALUES ('$nombre_res','$doc_res','$res_res',$grupo) ";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
?>
<script type="text/javascript">
	alert("Ingresado Exitosamante!!");
	window.location.href='index_responsables.php';
</script>