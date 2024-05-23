<?php
session_start();
include "../../Controllers/conx.php";

class Usuario
{
    public static function getAll()
    {
        $db = new conexion();
        $query = "SELECT * FROM usuarios";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idusuarios' => $row['idusuarios'],
                    'roles_idroles' => $row['roles_idroles'],
                    'nombreusuario' => $row['nombreusuario'],
                    'contrasena' => $row['contrasena'],
                    'usuario' => $row['usuario']
                ];
            }
        }
        return $datos;
    } //end Getall

    public static function getWhere($idusuarios)
    {
        $db = new conexion();
        // Realizar la vista
        $query = "SELECT * FROM usuarios WHERE idusuarios=$idusuarios";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'idusuarios' => $row['idusuarios'],
                    'roles_idroles' => $row['roles_idroles'],
                    'nombreusuario' => $row['nombreusuario'],
                    'contrasena' => $row['contrasena'],
                    'usuario' => $row['usuario']
                ];
            }
        }
        return $datos;
    } //end getWhere


    public static function insert($roles_idroles, $nombreusuario, $contrasena, $usuario)
    {
        $db = new conexion();
        // Realizar la inserción 
        $query = "INSERT INTO usuarios (roles_idroles, nombreusuario, contrasena, usuario) VALUES ('" . $roles_idroles . "','" . $nombreusuario . "','" . $contrasena . "','" . $usuario . "')";
        $db->query($query);

        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($idusuarios, $roles_idroles, $nombreusuario, $contrasena, $usuario)
    {
        $db = new conexion();
        // Realizar la modificación 
        $query = "UPDATE usuarios SET roles_idroles='" . $roles_idroles . "', nombreusuario='" . $nombreusuario . "', contrasena='" . $contrasena . "', usuario='" . $usuario . "' WHERE idusuarios=" . $idusuarios;
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Update

    public static function delete($idusuarios)
    {
        $db = new conexion();
        // Realizar la eliminación 
        $query = "DELETE FROM usuarios WHERE idusuarios=$idusuarios";
        $db->query($query);
        if ($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    } //end Delete


} //Fin clase Usuarios

?>