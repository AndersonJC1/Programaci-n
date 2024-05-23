<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreUsuario = $_POST["nombreusuario"];
    $contrasena = $_POST["contrasena"];
    $usuario = $_POST["usuario"];
    $rol = $_POST["roles"];

    // Realizar la conexión a la base de datos (asegúrate de incluir este código)
    include '../Controllers/conexion.php';

    // Consulta para verificar si el usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // El usuario ya existe, muestra un mensaje de error
        echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
        echo '<meta http-equiv="refresh" content="1; url=../Views/agregarusuario.php">';
    } else {
        // El usuario no existe, puedes proceder a registrarlos en la base de datos

        // Asegúrate de realizar una inserción segura en la base de datos utilizando consultas preparadas
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombreusuario, contrasena, usuario, roles_idroles) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombreUsuario, $contrasena, $usuario, $rol);

        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
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