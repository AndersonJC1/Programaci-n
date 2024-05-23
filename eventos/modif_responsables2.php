<?php
	
	$id = $_REQUEST['id'];
	$nombre_res=$_POST['nombre_res'];
	$doc_res=$_POST['doc_res'];
	$res_res=$_POST['responsabilidad'];
	$grupo=$_REQUEST['grupo'];

	include 'conexion.php';
	$sentencia="UPDATE responsables  SET Nombre_responsable='$nombre_res',Numero_identificacion='$doc_res',Responsabilidad='$res_res',Grupos_responsables_idGrupos=$grupo WHERE idResponsables=$id";
	$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	
?>
<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='index_responsables.php';
</script>