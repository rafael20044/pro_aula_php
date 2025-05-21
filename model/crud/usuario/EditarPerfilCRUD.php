<?php
require_once __DIR__ . '../../../Conexion.php';

class EditarPerfilCRUD
{
    public static function editar($params)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = '';
        if ($params[':password']) {
            $query = 'UPDATE usuarios SET 
                    nombre1 = :nombre1,
                    nombre2 = :nombre2,
                    apellido1 = :apellido1,
                    apellido2 = :apellido2,
                    email = :email,
                    password = :password
                WHERE id = :id';
        } else {
            $query = 'UPDATE usuarios SET 
                    nombre1 = :nombre1,
                    nombre2 = :nombre2,
                    apellido1 = :apellido1,
                    apellido2 = :apellido2,
                    email = :email
                WHERE id = :id';
            unset($params[':password']);
        }

        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute($params);
        } catch (\Throwable $th) {
            echo $stmt->errorInfo()[2];
        }
    }
}
