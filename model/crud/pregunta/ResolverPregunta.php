<?php
require_once __DIR__ . '../../../Conexion.php';
class ResolverPregunta
{
    public static function resolverPor($id)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "UPDATE preguntas SET estado = 'resuelta', updated_at = now() WHERE id = :id ";
        $stmt = $conexion->prepare($query);
        try {
            return $stmt->execute([':id' => $id]);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
