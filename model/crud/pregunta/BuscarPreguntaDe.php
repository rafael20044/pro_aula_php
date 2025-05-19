<?php
require_once __DIR__ . '../../../Conexion.php';
require_once __DIR__ . '../../../dto/PreguntaEtiquetaRespuesta.php';

class BuscarPreguntaDe
{
    public static function buscarPreguntasDe($usuarioID)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "SELECT 
                    p.id AS pregunta_id, 
                    p.titulo, 
                    p.contenido, 
                    p.estado, 
                    p.created_at,
                    e.id AS etiqueta_id, 
                    e.nombre AS nombre_etiqueta,
                    COUNT(r.id) AS numero_comentario
                FROM preguntas p  
                JOIN etiquetas e ON p.etiqueta_id = e.id 
                LEFT JOIN respuestas r ON p.id = r.pregunta_id
                WHERE p.usuario_id = :usuario_id AND p.estado != 'eliminado'
                GROUP BY 
                    p.id, p.titulo, p.contenido, p.estado, p.created_at,
                    e.id, e.nombre
                ORDER BY p.created_at DESC";

        $stmt = $conexion->prepare($query);
        $stmt->execute([':usuario_id' => $usuarioID]);
        $preguntas = [];
        $index = 0;
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pregunta = new PreguntaEtiquetaRespuesta($fila);
            $preguntas[$index] = $pregunta;
            $index++;
        }
        return $preguntas;
    }
}
