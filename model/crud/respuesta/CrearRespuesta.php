<?php
require_once __DIR__ . '../../../Conexion.php';

class CrearRespuesta
{
    public static function crear($params){
        $conexioPDO = new Conexion();
        $conexion = $conexioPDO->getConexion();
        $query = 'INSERT INTO respuestas(usuario_id, pregunta_id, contenido)
                    VALUES (:usuario_id, :pregunta_id, :contenido)';
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute($params);
        } catch (\Throwable $th) {
            //echo $stmt->errorInfo(2);
            return false;
        }
    }
}
