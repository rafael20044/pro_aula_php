<?php
require_once __DIR__ . '../../../Conexion.php';
require_once __DIR__ . '../../../dto/ComentarioUsuarioReaccio.php';
class BuscarRespuestaDepregunta
{
    public static function buscar($preguntaId){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "SELECT 
                    CONCAT(u.nombre1, ' ', u.nombre2, ' ', u.apellido1, ' ', u.apellido2) AS nombre,
                    r.id,
                    r.contenido,
                    r.created_at,
                    r.estado,
                    r.usuario_id,
                    SUM(CASE WHEN re.tipo = 'dislike' THEN 1 ELSE 0 END) AS dislike,
                    SUM(CASE WHEN re.tipo = 'like' THEN 1 ELSE 0 END) AS likes
                FROM respuestas r 
                JOIN usuarios u ON r.usuario_id = u.id
                LEFT JOIN reacciones re ON re.respuesta_id = r.id 
                WHERE r.pregunta_id = :pregunta_id AND r.estado = 'activo'
                GROUP BY 
                    r.id, r.contenido, r.created_at, r.estado, r.usuario_id,
                    u.nombre1, u.nombre2, u.apellido1, u.apellido2, u.id
                ORDER BY r.created_at DESC";


        $stmt = $conexion->prepare($query);
        $stmt->execute([':pregunta_id' => $preguntaId]);
        $respuestas = [];
        $index = 0;
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $respuestas[$index] = new ComentarioUsuarioReaccio($fila);
            $index++;
        }
        return $respuestas;
    }
}
