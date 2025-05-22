<?php
require_once __DIR__ . '../../../Conexion.php';

class EditarRespuestaCRUD
{
    public static function editar($params)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'UPDATE respuestas 
                SET 
                        contenido = :contenido, 
                        updated_at = now() 
                WHERE id = :respuesta_id';
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute($params);
        } catch (\Throwable $th) {
            echo $stmt->errorInfo()[2];
        }
    }
}
