<?php
require_once __DIR__ . '../../../Conexion.php';

class EliminarRespuestaCRUD
{
    public static function eliminar($respuesta_id)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "UPDATE respuestas 
                SET 
                        estado = 'eliminado', 
                        updated_at = now() 
                WHERE id = :respuesta_id";
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute([':respuesta_id'=>$respuesta_id]);
        } catch (\Throwable $th) {
            echo $stmt->errorInfo()[2];
        }
    }
}
