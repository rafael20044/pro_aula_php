<?php
require_once __DIR__ . '../../../Conexion.php';

class EliminarUsuario
{
    public static function eliminar($id){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "UPDATE usuarios SET estado = 'inactivo' WHERE id = :id ";
        $stmt = $conexion->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
