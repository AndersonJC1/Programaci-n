<?php

require_once "permisos.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(Permiso::getWhere($_GET['id']));
        } else {
            echo json_encode(Permiso::getAll());
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Permiso::insert($datos->usuarios_idusuarios, $datos->fk_permisos, $datos->modulo)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Permiso::update($datos->idpermisoespecifico, $datos->usuarios_idusuarios, $datos->fk_permisos, $datos->modulo)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;
    case 'DELETE':
        if (isset($_GET['id'])) {
            if (Permiso::delete($_GET['id'])) {
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