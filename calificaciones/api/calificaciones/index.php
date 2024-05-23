<?php

require_once "calificaciones.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(Calificacion::getWhere($_GET['id']));
        } else {
            echo json_encode(Calificacion::getAll());
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Calificacion::insert($datos->estudiante, $datos->materia, $datos->nota)) {
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
            if (Calificacion::update($datos->idcalificacion, $datos->estudiante, $datos->materia, $datos->nota)) {
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
            if (Calificacion::delete($_GET['id'])) {
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