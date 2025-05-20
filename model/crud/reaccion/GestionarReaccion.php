<?php
require_once __DIR__ . '../../../Conexion.php';

class GestionarReaccion
{
    public static function gestionar($datos)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "SELECT id, tipo FROM reacciones WHERE usuario_id = :usuario_id AND respuesta_id = :respuesta_id";
        $stmt = $conexion->prepare($query);
        $stmt->execute([
            ':usuario_id' => $datos[':usuario_id'],
            ':respuesta_id' => $datos[':respuesta_id']
        ]);
        $reaccion = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($reaccion) {
            if ($reaccion['tipo'] === $datos[':tipo']) {
                // Si ya hizo la misma reacción, eliminarla
                $delete = "DELETE FROM reacciones WHERE id = ?";
                $conexion->prepare($delete)->execute([$reaccion['id']]);
            } else {
                // Si cambia de tipo de reacción
                $update = "UPDATE reacciones SET tipo = ? WHERE id = ?";
                $conexion->prepare($update)->execute([$datos[':tipo'], $reaccion['id']]);
            }
        } else {
            // Si no hay reacción previa, insertarla
            $insert = "INSERT INTO reacciones (usuario_id, respuesta_id, tipo) VALUES (?, ?, ?)";
            $conexion->prepare($insert)->execute([$datos[':usuario_id'], $datos[':respuesta_id'], $datos[':tipo']]);
        }
        return true;
    }
}
