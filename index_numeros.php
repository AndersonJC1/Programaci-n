<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Números</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <table class="table table-bordered">
      <thead>
        <th>Id</th>
        <th>Número 1</th>
        <th>Número 2</th>
        <th>Operación</th>
        <th>Resultado</th>
        <th>Fórmula</th>
        <th><a href="nueva_operacion.php"><button type="button" class="btn btn-info">Nuevo</button></a></th>
        <th><a href="index_operaciones.php"><button type="button" class="btn btn-info">Operaciones</button></a></th>
      </thead>
      <?php
        include "conexion.php";
        $sentencia = "SELECT numeros.idnumeros, numeros.numero1, numeros.numero2, operaciones.nombre, numeros.Resultado, numeros.formula FROM numeros INNER JOIN operaciones ON numeros.operaciones_idoperacion=operaciones.idoperacion";
        $resultado = $conexion->query($sentencia) or die(mysqli_error($conexion));
        while ($fila = $resultado->fetch_assoc()) {
          echo "<tr>";
            echo "<td>"; echo $fila['idnumeros']; echo "</td>";
            echo "<td>"; echo $fila['numero1']; echo "</td>";
            echo "<td>"; echo $fila['numero2']; echo "</td>";
            echo "<td>"; echo $fila['nombre']; echo "</td>";
            echo "<td>"; echo $fila['Resultado']; echo "</td>";
            echo "<td>"; echo $fila['formula']; echo "</td>";
          echo "</tr>";
        }
      ?>
    </table>
</div>
</body>
</html>
