<?php
session_start();
include "../../Controllers/conx.php";

class Materia
{
    public static function getAll()
    {
        $db = new conexion();
        $query = "SELECT * FROM materia";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idmateria' => $row['idmateria'],
                    'nombremateria' => $row['nombremateria']
                ];
            }
        }
        return $datos;
    } //end Getall

    public static function getWhere($idmateria)
    {
        $db = new conexion();
        // Realizar la vista
        $query = "SELECT * FROM materia";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idmateria' => $row['idmateria'],
                    'nombremateria' => $row['nombremateria']
                ];
            }
        }
        return $datos;
    } //end getWhere


    public static function insert($nombremateria)
    {
        $db = new conexion();
        //Realizar la inserción
        $query = "INSERT INTO materia (nombremateria) VALUES ('" . $nombremateria . "')";
        $db->query($query);

        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($idmateria, $nombremateria)
    {
        $db = new conexion();
        // Realizar la modificación 
        $query = "UPDATE materia SET nombremateria='" . $nombremateria . "' WHERE idmateria=" . $idmateria;
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Update

    public static function delete($idmateria)
    {
        $db = new conexion();
        // Realizar la eliminación 
        $query = "DELETE FROM materia WHERE idmateria=$idmateria";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Delete


} //Fin clase Usuarios

?>