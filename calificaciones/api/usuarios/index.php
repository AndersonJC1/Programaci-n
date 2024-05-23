<?php

require_once "usuarios.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': //Ver  http://localhost/CRUD/api/usuarios/?id=2  (Trae los datos del usuario con id=2
        if (isset($_GET['id'])) {
            echo json_encode(Usuario::getWhere($_GET['id']));
        } else {
            echo json_encode(Usuario::getAll());
        }
        break;

    case 'POST': //Insertar
        /*Consulta insertar Postman (raw) Ejemplo
        {
        "nombrerol": "Instructor",
        "nombreusuario": "Pepe Perez",
        "contrasena": "789",
        "usuario": "Pepito"
        }*/
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Usuario::insert($datos->roles_idroles, $datos->nombreusuario, $datos->contrasena, $datos->usuario)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'PUT': //Modificar
        /*Consulta Modificar Postman (raw) Ejemplo
        {
        "idusuarios": "2",
        "nombrerol": "Instructor",
        "nombreusuario": "Carlos Rio",
        "contrasena": "456789",
        "usuario": "Carlos"
    }*/
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Usuario::update($datos->idusuarios, $datos->roles_idroles, $datos->nombreusuario, $datos->contrasena, $datos->usuario)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;
    case 'DELETE': //http://localhost/CRUD/api/usuarios/?id=5 Eliminar el usuario con el id=5
        if (isset($_GET['id'])) {
            if (Usuario::delete($_GET['id'])) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    default:
        http_response_code(405);
        break;

}