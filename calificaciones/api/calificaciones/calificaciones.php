<?php
session_start();
include "../../Controllers/conx.php";

class Calificacion
{
    public static function getAll()
    {
        $db = new conexion();
        $query = "SELECT * FROM calificaciones";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idcalificacion' => $row['idcalificacion'],
                    'estudiante' => $row['estudiante'],
                    'materia' => $row['materia'],
                    'nota' => $row['nota']
                ];
            }
        }
        return $datos;
    } //end Getall

    public static function getWhere($idcalificacion)
    {
        $db = new conexion();
        // Realizar la vista
        $query = "SELECT * FROM calificaciones";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idcalificacion' => $row['idcalificacion'],
                    'estudiante' => $row['estudiante'],
                    'materia' => $row['materia'],
                    'nota' => $row['nota']
                ];
            }
        }
        return $datos;
    } //end getWhere


    public static function insert($estudiante, $materia, $nota)
    {
        $db = new conexion();
        //Realizar la inserción
        $query = "INSERT INTO calificaciones (estudiante, materia, nota) VALUES ('" . $estudiante . "','" . $materia . "','" . $nota . "')";
        $db->query($query);

        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($idcalificacion, $estudiante, $materia, $nota)
    {
        $db = new conexion();
        // Realizar la modificación 
        $query = "UPDATE calificaciones SET estudiante='" . $estudiante . "', materia='" . $materia . "',nota='" . $nota . "' WHERE idcalificacion=" . $idcalificacion;
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Update

    public static function delete($idcalificacion)
    {
        $db = new conexion();
        // Realizar la eliminación 
        $query = "DELETE FROM calificaciones WHERE idcalificacion=$idcalificacion";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Delete


} //Fin clase Usuarios

?>