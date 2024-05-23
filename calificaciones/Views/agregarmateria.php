<?php
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>

<body>
    <div class="titulo">
        <h1 class="txt">Agregar Materia</h1>
    </div>
    <div class="container">
        <form action="../Models/agregarmateria.php" method="POST">
            <div class="row">
                <div class="form-group col">

                    <label for="materia">Materia:</label>
                    <input type="text" id="materia" name="materia" required class="form-control"><br>

                    <div class="col text-center">
                        <button type="button&submit" class="btn btn-primary center-block">Agregar</button>
                    </div>
                </div>
        </form>
</body>

</html>