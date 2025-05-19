<?php
require_once __DIR__ . '../../../Conexion.php';
class EditarPregunta
{
    public static function editar($datos){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "UPDATE preguntas SET 
                    titulo = :titulo, 
                    contenido = :contenido, 
                    etiqueta_id = :etiqueta_id, 
                    updated_at = now()
                WHERE id = :id";
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute($datos);
        } catch (\Throwable $th) {
            return false;
        }
    }

}
