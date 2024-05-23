<?php
include 'conexion.php';
	$numero1=$_POST['num1'];
	$numero2=$_POST['num2'];
	$ope=$_REQUEST['operaciones'];
	$formula="";
	$resultado="";

	if($ope==1)
	{
	$resultado=$numero1+$numero2;
	}
	else if($ope==2)
	{
	$resultado=$numero1*$numero2;
	}
	else if($ope==3)
	{
	$resultado=$numero1/$numero2;
			if($numero2 == 0){
				die('No se puede dividir por cero');
				}else{
				$resultado=$numero1/$numero2;
				}
	}
	else if($ope==4)
	{
	$resultado=$numero1-$numero2;
	}

	if ($ope==1)
	{
	$formula="$numero1"." + "."$numero2"." = "."$resultado";
	}
	else if($ope==2)
	{
	$formula="$numero1"." * "."$numero2"." = "."$resultado";
	}
	else if($ope==3)
	{
	$formula="$numero1"." / "."$numero2"." = "."$resultado";
	}
	else if($ope==4)
	{
	$formula="$numero1"." - "."$numero2"." = "."$resultado";
	}

		$sentencia= "INSERT INTO numeros (numero1,numero2,operaciones_idoperacion,Resultado,formula) VALUES ('$numero1','$numero2',$ope,'$resultado','$formula')";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		//conexion de la variable conexion
		
?>
<script type="text/javascript">
	alert("Números Ingresados Exitosamante!!");
	window.location.href='index_numeros.php';
</script>