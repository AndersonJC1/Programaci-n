<?php
//libreria
session_start();
include "../Css/lib.php";
include "../Controllers/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <style>
        /* Estilos para el navbar horizontal */
        .navbar {
            display: flex;
            justify-content: space-between;
            background-color: ;
            padding: 10px;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <?php
            if (isset($_SESSION['username'])) {
                echo "<p>Bienvenido, " . $_SESSION['username'] . "!</p>";
            } else {
                echo "<p>Usuario no autenticado.</p>";
            }
            if (isset($_SESSION['rol'])) {
                echo "<p>Rol: " . $_SESSION['rol'] . "</p>";
            } else {
                echo "<p>Usuario no autenticado.</p>";
            }
            ?>
            <div>
                <button class="menu-button users" onclick="location.href='tablausuarios.php'">Usuarios</button>
                <button class="menu-button permissions" onclick="location.href='tablapermisos.php'">Permisos</button>
                <button class="menu-button grades"
                    onclick="location.href='tablacalificaciones.php'">Calificaciones</button>
                <button class="menu-button courses" onclick="location.href='tablamateria.php'">Cursos</button>
                <form action="../Models/logout.php" method="post" style="display: inline;">
                    <button type="submit" name="logout" class="menu-button logout">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>