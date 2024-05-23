<?php
// Iniciar la sesión
session_start();
// Verificar si se han enviado datos de inicio de sesión
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Conectar a la base de datos (debes configurar esto)
    include '../Controllers/conexion.php';
    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consultar la base de datos para verificar las credenciales
    $query = "SELECT usuarios.nombreusuario, roles.nombrerol, usuarios.idusuarios 
              FROM usuarios 
              INNER JOIN roles ON usuarios.roles_idroles = roles.idroles 
              /*INNER JOIN roles_has_permisos ON */
              WHERE usuarios.usuario = ? AND usuarios.contrasena = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {

        // Las credenciales son correctas, obtener el rol del usuario
        $stmt->bind_result($nombreusuario, $nombrerol, $idUsuario);
        $stmt->fetch();
        // Iniciar sesión para el usuario y almacenar su rol en una variable de sesión
        $_SESSION['username'] = $nombreusuario;
        $_SESSION['rol'] = $nombrerol;
        $_SESSION['idUsuario'] = $idUsuario;

        // Redirigir al usuario a la página correspondiente a su rol
        if ($nombrerol === "Estudiante" or $nombrerol === "Instructor") {
            header("Location: ../Views/tablacalificaciones.php");
        } elseif ($nombrerol === "Administrador") {
            header("Location: ../Views/index.php");
        }
        exit();
    } else {
        // Credenciales incorrectas, mostrar un mensaje de error
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
        echo '<meta http-equiv="refresh" content="2; url=../Views/login.html">';
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conexion->close();
}
?>