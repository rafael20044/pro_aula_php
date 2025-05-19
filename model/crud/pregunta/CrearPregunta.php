<?php
require_once __DIR__ . '../../../Conexion.php';
class CrearPregunta
{
    public static function crear($params)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'INSERT INTO preguntas(usuario_id, etiqueta_id, titulo, contenido) VALUES (:usuario_id, :etiqueta_id, :titulo, :contenido)';
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute($params);
        } catch (Exception $th) {
            /*echo $stmt->errorInfo()[2];
            echo $params[':etiqueta_id'];*/
            return false;
        }
    }
}
