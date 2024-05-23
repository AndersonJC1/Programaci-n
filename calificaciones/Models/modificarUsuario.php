<?php
include '../Controllers/conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_REQUEST['id'];
    $nombreUsuario = $_POST["nombreusuario"];
    $contrasena = $_POST["contrasena"];
    $usuario = $_POST["usuario"];
    $rol = $_REQUEST["roles_idroles"];

    // Consulta para verificar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombreusuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El usuario ya existe, muestra un mensaje de error
        echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
        echo '<meta http-equiv="refresh" content="1; url=../Views/tablausuarios.php">';
    } else {
        // El usuario no existe, puedes proceder a registrarlos en la base de datos

        // Asegúrate de realizar una inserción segura en la base de datos utilizando consultas preparadas
        $sql = "UPDATE usuarios SET nombreusuario = ?, contrasena = ?, usuario = ?, roles_idroles = ? WHERE idusuarios = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssii", $nombreUsuario, $contrasena, $usuario, $rol, $id);

        if ($stmt->execute()) {
            echo "Usuario modificado exitosamente.";
            echo '<meta http-equiv="refresh" content="1; url=../Views/tablausuarios.php">';
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
}
?>