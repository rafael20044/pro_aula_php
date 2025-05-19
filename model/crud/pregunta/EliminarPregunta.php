<?php
require_once __DIR__ . '../../../Conexion.php';


class EliminarPregunta
{
    public static function eliminarPor($id){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "UPDATE preguntas SET estado = 'eliminado', updated_at = now() WHERE id = :id ";
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute([':id' => $id]);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
