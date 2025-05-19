<?php
require_once __DIR__ . '../../../Conexion.php';
require_once __DIR__ . '../../../dto/PreguntausuarioEtiquetaComentario.php';
class BuscarPreguntaPor
{
    public static function buscarPor($id){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = "SELECT 
                    p.id AS pregunta_id, p.titulo, p.contenido, p.estado, p.created_at,
                    u.id AS id_usuario, 
                    CONCAT(u.nombre1, ' ', u.nombre2, ' ', u.apellido1, ' ', u.apellido2) AS nombre,
                    e.nombre AS nombre_etiqueta
                FROM preguntas p
                JOIN usuarios u ON p.usuario_id = u.id 
                JOIN etiquetas e ON p.etiqueta_id = e.id
                WHERE p.id = :id
                GROUP BY p.id, p.titulo, p.contenido, p.estado, p.created_at,
                    u.id, u.nombre1, u.nombre2, u.apellido1, u.apellido2,
                    e.id, e.nombre;";
        $stmt = $conexion->prepare($query);
        $stmt->execute([':id' => $id]);
        $resultado = new PreguntausuarioEtiquetaComentario($stmt->fetch(PDO::FETCH_ASSOC));
        return $resultado;
    }
}
