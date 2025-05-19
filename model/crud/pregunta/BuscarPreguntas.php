<?php
require_once __DIR__ . '../../../Conexion.php';
require_once __DIR__ . '../../../dto/PreguntaUsuarioEtiquetaRespuesta.php';

class BuscarPreguntas
{
    public static function buscar()
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "SELECT 
                    p.id AS id_publicacion, p.titulo, p.contenido, p.estado, p.created_at,
                    u.id AS usuario_id, 
                    CONCAT(u.nombre1, ' ', u.nombre2, ' ', u.apellido1, ' ', u.apellido2) AS nombre,
                    e.id AS etiqueta_id, e.nombre AS nombre_etiqueta,
                    COUNT(r.id) AS numero_comentarios
                FROM preguntas p
                JOIN usuarios u ON p.usuario_id = u.id 
                JOIN etiquetas e ON p.etiqueta_id = e.id
                LEFT JOIN respuestas r ON r.pregunta_id = p.id WHERE p.estado != 'eliminado'
                GROUP BY p.id, p.titulo, p.contenido, p.estado, p.created_at,
                    u.id, u.nombre1, u.nombre2, u.apellido1, u.apellido2,
                    e.id, e.nombre
                ORDER BY p.created_at DESC";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $preguntas = [];
        $index = 0;
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $puer = new PreguntaUsuarioEtiquetaRespuesta($fila);
            $preguntas[$index] = $puer;
            $index++;
        }
        return $preguntas;
    }

}
