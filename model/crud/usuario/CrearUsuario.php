<?php
require_once __DIR__ . '../../../Conexion.php';

class CrearUsuario
{
    public static function crearUsuario($datos)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'INSERT INTO usuarios(nombre1, nombre2, apellido1, apellido2, email, password)
                    VALUES (:nombre1, :nombre2, :apellido1, :apellido2, :email, :password)';
        $stmt = $conexion->prepare($query);

        $params = [
            ':nombre1'   => trim($datos['nombre1']),
            ':nombre2'   => trim($datos['nombre2']),
            ':apellido1' => trim($datos['apellido1']),
            ':apellido2' => trim($datos['apellido2']),
            ':email'     => trim($datos['correo']),
            ':password' => password_hash(trim($datos['contraseña']), PASSWORD_DEFAULT),
        ];

        try {
            return $stmt->execute($params);
        } catch (PDOException $e) {
            return false;
        }
    }
}
