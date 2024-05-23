<?php
session_start();
include "../../Controllers/conx.php";

class Permiso
{
    public static function getAll()
    {
        $db = new conexion();
        $query = "SELECT * FROM permisoespecifico";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idpermisoespecifico' => $row['idpermisoespecifico'],
                    'usuarios_idusuarios' => $row['usuarios_idusuarios'],
                    'fk_permisos' => $row['fk_permisos'],
                    'modulo' => $row['modulo']
                ];
            }
        }
        return $datos;
    } //end Getall

    public static function getWhere($idpermisoespecifico)
    {
        $db = new conexion();
        // Realizar la vista
        $query = "SELECT * FROM permisoespecifico";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idpermisoespecifico' => $row['idpermisoespecifico'],
                    'usuarios_idusuarios' => $row['usuarios_idusuarios'],
                    'fk_permisos' => $row['fk_permisos'],
                    'modulo' => $row['modulo']
                ];
            }
        }
        return $datos;
    } //end getWhere


    public static function insert($usuarios_idusuarios, $fk_permisos, $modulo)
    {
        $db = new conexion();
        //Realizar la inserción
        $query = "INSERT INTO permisoespecifico (usuarios_idusuarios, fk_permisos, modulo) VALUES ('" . $usuarios_idusuarios . "','" . $fk_permisos . "','" . $modulo . "')";
        $db->query($query);

        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($idpermisoespecifico, $usuarios_idusuarios, $fk_permisos, $modulo)
    {
        $db = new conexion();
        // Realizar la modificación 
        $query = "UPDATE permisoespecifico SET usuarios_idusuarios='" . $usuarios_idusuarios . "', fk_permisos='" . $fk_permisos . "',modulo='" . $modulo . "' WHERE idpermisoespecifico=" . $idpermisoespecifico;
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Update

    public static function delete($idpermisoespecifico)
    {
        $db = new conexion();
        // Realizar la eliminación 
        $query = "DELETE FROM permisoespecifico WHERE idpermisoespecifico=$idpermisoespecifico";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Delete


} //Fin clase Usuarios

?>